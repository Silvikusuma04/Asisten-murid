<!DOCTYPE html>
<html>
<head>
    <title>Chat dengan Guru dan Layanan Pelanggan</title>
    <style>


        .chatbox {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            border: 1px solid #ccc;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: none;
        }

        .chatbox .chat-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            font-weight: bold;
            cursor: pointer;
        }

        .chatbox .chat-messages {
            height: 250px;
            padding: 10px;
            overflow-y: scroll;
            background-color: #fff;
        }

        .chatbox .chat-message {
            margin-bottom: 10px;
        }

        .chatbox .chat-message .sender {
            font-weight: bold;
            margin-bottom: 5px;
        }

        .chatbox .chat-input {
            border-top: 1px solid #ccc;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .chatbox .chat-input input[type="text"] {
            width: 100%;
            padding: 5px;
            border: none;
            border-radius: 5px;
        }

        .chatbox .chat-input input[type="submit"] {
            margin-top: 5px;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .support-box {
            background-color: #f9f9f9;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .support-box textarea {
            width: 100%;
            padding: 5px;
            border: none;
            border-radius: 5px;
        }

        .support-box input[type="submit"] {
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Chat dengan Guru dan Layanan Pelanggan</h1>

        <button onclick="openChat('guru')" style="background-color: #007bff; color: #fff; padding: 10px 20px; font-size: 14px; border-radius: 5px; border: none; cursor: pointer;">Chat dengan Guru</button>
        <button onclick="openChat('customer_service')" style="background-color: #007bff; color: #fff; padding: 10px 20px; font-size: 14px; border-radius: 5px; border: none; cursor: pointer;">Chat dengan Layanan Pelanggan</button>

        <div class="chatbox" id="chatbox">
            <div class="chat-header" onclick="toggleChatbox()">Chat</div>
            <div class="chat-messages" id="chat-messages"></div>
            <div class="chat-input">
                <input type="text" id="message-input" placeholder="Ketik pesan Anda">
                <input type="submit" value="Kirim" onclick="sendMessage()">
            </div>
        </div>

        <div class="support-box">
            <h2>Bantuan dan Dukungan</h2>
            <textarea placeholder="Tuliskan pertanyaan atau masalah Anda"></textarea>
            <input type="submit" value="Kirim" style="background-color: #007bff; color: #fff; padding: 10px 15px; font-size: 14px; border-radius: 5px; border: none; cursor: pointer;">
        </div>
    </div>

    <script>
        var chatbox = document.getElementById('chatbox');
        var chatMessages = document.getElementById('chat-messages');

        function openChat(role) {
            chatbox.style.display = 'block';
            chatMessages.innerHTML = '';
            var greeting = (role === 'guru') ? 'Halo, saya seorang guru. Ada yang bisa saya bantu?' : 'Halo, ada yang bisa kami bantu? Silakan ajukan pertanyaan atau masalah Anda.';
            appendMessage('Support', greeting);
        }

        function toggleChatbox() {
            chatbox.style.display = (chatbox.style.display === 'none') ? 'block' : 'none';
        }

        function sendMessage() {
            var messageInput = document.getElementById('message-input');
            var message = messageInput.value;
            messageInput.value = '';

            if (message !== '') {
                appendMessage('User', message);
            }
        }

        function appendMessage(sender, message) {
            var chatMessage = document.createElement('div');
            chatMessage.className = 'chat-message';

            var senderElement = document.createElement('div');
            senderElement.className = 'sender';
            senderElement.textContent = sender;

            var messageElement = document.createElement('div');
            messageElement.textContent = message;

            chatMessage.appendChild(senderElement);
            chatMessage.appendChild(messageElement);
            chatMessages.appendChild(chatMessage);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    </script>
</body>
</html>
