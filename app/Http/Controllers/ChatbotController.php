<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use OpenAI;
use App\Models\User;

class ChatbotController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        return view('chatbot', compact('user'));
    }
    // to test the other api (testing.py)
    public function chatResponse(Request $request)
    {
        $text = $request->input('message');
        $user = User::find(1); // Assuming you have authentication set up
        $stage = session('progress_stage', 1);
        $quest = session('current_quest', null);
        $reward_points = session('reward_points', 0);

        \Log::info('Request:', ['chatResponse Entered']);

        $response = Http::post('http://127.0.0.1:5000/chat-cbt-response', [
            'text' => $text,
            'user_id' => $user->id ?? null, // Pass user ID
            'progress_stage' => $stage,
            'current_quest' => $quest,
            'reward_points' => $reward_points

        ]);
        \Log::info('Response:', [$response->getBody()]);
        $data = json_decode($response->getBody(), true);

        // Store the response from the python api
        session(['progress_stage' => $data['progress_stage']]);
        session(['current_quest' => $data['quest']]);
        session(['reward_points' => $data['reward_points']]);

        return response()->json($data);

    }
    //main function for getting response from the api
    public function getResponse(Request $request)
    {
        $userInput = $request->input('message');

        // Initialize chat history if it doesn't exist
        if (!$request->session()->has('chat_history')) {
            $request->session()->put('chat_history', []);
        }

        // Get the current chat history
        $chatHistory = $request->session()->get('chat_history');
        $stage = $request->session()->get('progress_stage', 1);

        // Send the user input and chat history to the Flask API
        $chatbotResponse = Http::post('http://localhost:5000/chat-cbt-response', [
            'text' => $userInput,
            'chat_history' => $chatHistory, // Send the chat history
            'stage' => $stage, // Hardcoded for now
        ]);

        // debuging the response
        \Log::info('Chatbot Response:', [$chatbotResponse]);

        // Get the chatbot response from the API
        $cbtResponse = $chatbotResponse->json()['cbt_response'];
        \Log::info('CBT Response:', [$cbtResponse]);

        // Append user input and chatbot response to chat history
        $chatHistory[] = ['role' => 'user', 'content' => $userInput];
        $chatHistory[] = ['role' => 'assistant', 'content' => $cbtResponse];

        // Update the session with the new chat history
        $request->session()->put('chat_history', $chatHistory);
        $request->session()->put('progress_stage', $chatbotResponse->json()['progress_stage']);

        return response()->json([
            'cbt_response' => $cbtResponse,
        ]);

        // this logic is handled in python but it can be handled here as well
        // python is chosen because openai documentation are clearere in the open ai api
        // and we can simplify the logic here to focus on the stage and rewards
        // altough still we can use it here
        // ane katabet l comments wla mesh chatgpt 😊
        // falfel

        // $systemPrompt = $this->getSystemPrompt($currentStage, $emotion);


        // $openaiResponse = OpenAI::chat()->create([
        //     'model' => 'gpt-3.5-turbo',
        //     'messages' => [
        //         [
        //             'role' => 'system',
        //             'content' => $systemPrompt,
        //         ],
        //         [
        //             'role' => 'user',
        //             'content' => $userInput,
        //         ],
        //     ],
        //     'max_tokens' => 150,
        //     'temperature' => 0.7,
        // ]);

        // $chatbotResponse = $openaiResponse['choices'][0]['message']['content'];

        // // Check if the user has completed the current stage
        // // if ($this->isStageComplete($currentStage, $userInput)) {
        // //     $request->session()->put('current_stage', $currentStage + 1);
        // //     $chatbotResponse .= "\n\nGreat job! You've completed Stage {$currentStage}. Now, let's move on to Stage " . ($currentStage + 1) . ".";
        // // }

        // return response()->json([
        //     'response' => $chatbotResponse,
        //     'emotion' => $emotion,
        //     'current_stage' => $currentStage,
        // ]);
    }
    // this logic is good try to implement
    private function getSystemPrompt($currentStage, $emotion)
    {
        // Define the dynamic quest system
        $prompt = "You are a friendly CBT therapist guiding the user through a self-improvement quest. " .
                  "The user is on Stage {$currentStage} and is feeling {$emotion}. " .
                  "Provide motivational and structured guidance based on their stage.";

        switch ($currentStage) {
            case 1:
                $prompt .= " In this stage, focus on helping the user recognize and understand their emotions.";
                break;
            case 2:
                $prompt .= " Now, help the user challenge negative thoughts and replace them with positive ones.";
                break;
            case 3:
                $prompt .= " Encourage the user to take small actions that can improve their mood.";
                break;
            default:
                $prompt .= " The user has completed the main quest. Provide general emotional support and motivation.";
                break;
        }

        return $prompt;
    }

    private function isStageComplete($currentStage, $userInput)
    {
        // Define simple criteria to check if the stage is complete
        switch ($currentStage) {
            case 1:
                return str_contains(strtolower($userInput), ['happy', 'sad', 'angry', 'anxious']); // Example check
            case 2:
                return str_contains(strtolower($userInput), ['i realize', 'i understand', 'i see that']);
            case 3:
                return str_contains(strtolower($userInput), ['i will', 'i plan to', 'i am doing']);
            default:
                return false;
        }
    }


}
