<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AI Chatbot</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <style>
        .chat-box {
            height: 400px;
            overflow-y: auto;
            border: 1px solid #deed;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
        .message {
            margin-bottom: 12px;
            padding: 10px 15px;
            border-radius: 12px;
            max-width: 75%;
            word-wrap: break-word;
        }
        .message.user {
            background-color: #0d6efd;
            color: #fff;
            margin-right: auto;
        }
        .message.bot {
            background-color: #e9ecef;
            color: #212529;
            margin-left: auto;
        }
    </style>
</head>
<body class="bg-light">
<x-navbar></x-navbar>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">المساعد الذكي (Chatbot)</h5>
                </div>
                <div class="card-body">
                    <div id="chatBox" class="chat-box mb-3 d-flex flex-column">
                        <div class="message bot">أهلاً بك! كيف يمكنني مساعدتك اليوم؟</div>
                    </div>

                    <form id="chatForm" class="d-flex gap-2">
                        <input type="text" id="userInput" class="form-control" placeholder="اكتب رسالتك هنا..." required autocomplete="off">
                        <button type="submit" class="btn btn-primary" id="sendBtn">إرسال</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const chatForm = document.getElementById('chatForm');
    const userInput = document.getElementById('userInput');
    const chatBox = document.getElementById('chatBox');
    const sendBtn = document.getElementById('sendBtn');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    chatForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        const message = userInput.value.trim();
        if (!message) return;

        // إظهار رسالة المستخدم
        appendMessage(message, 'user');
        userInput.value = '';
        sendBtn.disabled = true;

        // إظهار مؤشر الانتظار
        const loadingId = appendMessage('جاري التفكير...', 'bot');

        try {
            const response = await fetch("{{ route('chat.send') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken
                },
                body: JSON.stringify({ message: message })
            });

            const data = await response.json();

            // إزالة مؤشر الانتظار
            document.getElementById(loadingId).remove();

            if (response.ok) {
                appendMessage(data.reply, 'bot');
            } else {
                appendMessage('خطأ: ' + (data.error || 'حدث خطأ أثناء معالجة الطلب.'), 'bot');
            }
        } catch (error) {
            document.getElementById(loadingId).remove();
            appendMessage('حدث خطأ في الاتصال بالخادم.', 'bot');
        } finally {
            sendBtn.disabled = false;
        }
    });

    function appendMessage(text, sender) {
        const msgDiv = document.createElement('div');
        const id = 'msg-' + Date.now();
        msgDiv.id = id;
        msgDiv.classList.add('message', sender);
        msgDiv.textContent = text;
        chatBox.appendChild(msgDiv);
        chatBox.scrollTop = chatBox.scrollHeight;
        return id;
    }
</script>

</body>
</html>
