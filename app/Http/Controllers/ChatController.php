<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use OpenAI;
use App\Models\User;

class ChatController extends Controller
{
    public function index()
    {
        $user = User::find(1);
        return view('chatbot', compact('user'));
    }

    public function getResponse(Request $request)
    {
        $userInput = $request->input('message');

        $currentStage = $request->session()->get('current_stage', 1);


        $chatbotResponse = Http::post('http://localhost:5000/chat-cbt-response', [
            'text' => $userInput,
        ]);


        \Log::info('Chatbot Response:', [$chatbotResponse]);

        $cbtResponse = $chatbotResponse->json()['cbt_response'];
        \Log::info('CBT Response:', [$cbtResponse]);

        return response()->json([
            'cbt_response' => $cbtResponse,

        ]);
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
