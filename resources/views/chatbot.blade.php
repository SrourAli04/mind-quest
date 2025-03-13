@extends('layouts.app')


@section('content')
<div class="container">
    <div class="chat-page">
        <aside class="chat-sidebar">
            <div class="user-profile">
                <div class="user-avatar">👤</div>
                <div class="user-info">
                    <div class="user-name">Welcome,{{$user->name}}</div>
                    <div class="user-status">Current Quest: <span id="current-quest">Loading...</span></div>
                </div>
            </div>

            <div class="chat-controls">
                <button class="btn btn-primary btn-full" id="new-conversation">New Conversation</button>
                <div class="emotion-tracker">
                    <h3>Your Emotion Tracker</h3>
                    <div id="emotion-history">
                        <div class="emotion-day">
                            <div class="emotion-icon">😊</div>
                            <div class="emotion-date">Today</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="chat-history">
                <h3>Recent Conversations</h3>
                <div class="history-list" id="chat-history">
                    <div class="history-item active">
                        <div class="history-icon">🐉</div>
                        <div class="history-details">
                            <div class="history-title">Anxiety Dragon Quest</div>
                            <div class="history-date">Today, 2:30 PM</div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="chat-main">
            <div class="chat-header">
                <div class="chat-title">
                    <div class="chat-icon">🐉</div>
                    <h2>Anxiety Dragon Quest</h2>
                </div>
                <div class="emotion-indicator">
                    <span id="detected-emotion">😊</span>
                    <span id="emotion-text">Positive mood detected</span>
                </div>
            </div>

            <div class="chat-messages" id="chat-messages">
                <div class="date-divider">Today</div>
            </div>

            <div class="chat-input">
                <input type="text" id="user-message" placeholder="Type a message...">
                <button class="send-button" id="send-message">➤</button>
            </div>
        </main>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const messageInput = document.getElementById('user-message');
    const sendButton = document.getElementById('send-message');
    const chatMessages = document.getElementById('chat-messages');
    const emotionIndicator = document.getElementById('detected-emotion');
    const emotionText = document.getElementById('emotion-text');
    const currentQuest = document.getElementById('current-quest');

    sendButton.addEventListener('click', function () {
        const userMessage = messageInput.value.trim();
        if (userMessage === '') return;

        // Append user message to chat
        chatMessages.innerHTML += `
            <div class="message user">
                <div class="message-content">${userMessage}</div>
                <div class="message-time">${new Date().toLocaleTimeString()}</div>
            </div>
        `;
        messageInput.value = '';

        // Send request to Laravel controller
        fetch("{{ route('chat.response') }}", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
            body: JSON.stringify({ message: userMessage })
        })
        .then(response => response.json())  // Wait for the JSON response
        .then(data => {
            console.log('the response data is', data);  // Log the actual response data

            // Check if cbt_response exists and append it to chat
            if (data.cbt_response) {
            chatMessages.innerHTML += `
                <div class="message bot">
                    <div class="message-content">${data.cbt_response}</div>
                    <div class="message-time">${new Date().toLocaleTimeString()}</div>
                </div>
            `;
            }

            // // Update emotion indicator
            // emotionIndicator.textContent = data.emotion;
            // emotionText.textContent = `Detected mood: ${data.emotion}`;

            // // Update current quest stage
            // currentQuest.textContent = `Stage ${data.current_stage}`;
        })
        .catch(error => {
            console.error('There was an error with the fetch request:', error);
            chatMessages.innerHTML += `
                <div class="message bot">
                    <div class="message-content">Sorry Pyramia is unavailable at this time</div>
                    <div class="message-time">${new Date().toLocaleTimeString()}</div>
                </div>
            `;
        });
    });

    // Press Enter to send message
    messageInput.addEventListener('keypress', function (event) {
        if (event.key === 'Enter') {
            sendButton.click();
        }
    });
});
</script>
@endsection
