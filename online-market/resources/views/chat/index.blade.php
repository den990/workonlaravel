@extends('layouts.app')

@section('title', 'Chat')

@section('content')
    @foreach($chats as $chat)
        <div>
            <h3>Chat with {{ $chat->user2->name }}</h3>
            <ul id="messages-{{ $chat->id }}">
                @foreach($chat->messages as $message)
                    <li>{{ $message->text }}</li>
                @endforeach
            </ul>
            <input type="text" id="message-{{ $chat->id }}" placeholder="Type a message">
            <button data-id="{{ $chat->id }}">Send</button>
        </div>
    @endforeach

    <script type="module">
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('button[data-id]').forEach(button => {
                const chatId = button.getAttribute('data-id');
                window.Echo.private('chat.' + chatId)
                    .listen('MessageSent', (e) => {
                        console.log(e.message);
                        const messagesContainer = document.getElementById('messages-' + e.message.chat_id);
                        if (messagesContainer) {
                            const newMessage = document.createElement('li');
                            newMessage.textContent = e.message.text;
                            messagesContainer.appendChild(newMessage);
                        }
                    });

                button.addEventListener('click', () => {
                    sendMessage(chatId);
                });
            });

            function sendMessage(chatId) {
                const messageInput = document.getElementById('message-' + chatId);
                const message = messageInput.value;
                messageInput.value = '';

                fetch('/chats/' + chatId + '/messages', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({ text: message, user_id: {{auth()->user()->id}} })
                }).then(response => response.json())
                    .then(data => {
                        console.log(data);
                    });
            }
        });
    </script>

@endsection
