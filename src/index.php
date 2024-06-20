<!DOCTYPE html>
<html>
<head>
    <title>Real-Time Chat</title>
</head>
<body>
    <h1>Real-Time Chat</h1>
    <div id="chat"></div>
    <input type="text" id="message" placeholder="Enter message">
    <button onclick="sendMessage()">Send</button>

    <script>
        let conn = new WebSocket('ws://localhost:8080');
        conn.onmessage = function(e) {
            document.getElementById('chat').innerHTML += e.data + '<br>';
        };

        function sendMessage() {
            let message = document.getElementById('message').value;
            conn.send(message);
            document.getElementById('message').value = '';
        }
    </script>
</body>
</html>
