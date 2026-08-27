<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AI Chat | {{ config('app.name') }}</title>
    <x-bootstrap-Css></x-bootstrap-Css>
    <style>
        :root {
            --ink: #17231f;
            --muted: #728078;
            --paper: #f5f4ef;
            --line: #dfe3dc;
            --navy: #253c52;
            --coral: #e68167;
            --mint: #c9e8d5;
        }

        body {
            background: var(--paper);
            color: var(--ink);
            min-height: 100vh;
        }

        .chat-page {
            max-width: 1240px;
            margin: 0 auto;
            padding: 46px 24px 64px;
        }

        .chat-intro {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 24px;
            margin-bottom: 24px;
        }

        .eyebrow {
            color: var(--coral);
            font: 700 12px Arial, sans-serif;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        h1 {
            font: 400 clamp(2.4rem, 5vw, 4.5rem)/.95 Georgia, serif;
            margin: 10px 0 14px;
        }

        .intro-copy {
            color: var(--muted);
            font: 15px/1.6 Arial, sans-serif;
            max-width: 520px;
            margin: 0;
        }

        .chat-layout {
            display: grid;
            grid-template-columns: 260px minmax(0, 1fr);
            gap: 18px;
            align-items: stretch;
        }

        .chat-sidebar,
        .chat-panel {
            background: #fff;
            border: 1px solid var(--line);
        }

        .chat-sidebar {
            padding: 22px;
        }

        .assistant-badge {
            width: 54px;
            height: 54px;
            display: grid;
            place-items: center;
            background: var(--navy);
            color: #fff;
            font: 700 20px Georgia, serif;
            margin-bottom: 18px;
        }

        .sidebar-title {
            font: 700 14px Arial, sans-serif;
            margin-bottom: 12px;
        }

        .sidebar-copy {
            color: var(--muted);
            font: 13px/1.55 Arial, sans-serif;
            margin-bottom: 24px;
        }

        .prompt {
            width: 100%;
            border: 1px solid var(--line);
            background: #fafbf8;
            color: var(--ink);
            text-align: left;
            padding: 11px 12px;
            margin-top: 8px;
            font: 13px Arial, sans-serif;
            transition: background .2s, border-color .2s;
        }

        .prompt:hover {
            background: var(--mint);
            border-color: #a8d0b7;
        }

        .privacy-note {
            border-top: 1px solid var(--line);
            color: var(--muted);
            font: 11px/1.5 Arial, sans-serif;
            margin-top: 24px;
            padding-top: 18px;
        }

        .chat-panel {
            min-width: 0;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-height: 650px;
        }

        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            border-bottom: 1px solid var(--line);
            padding: 18px 22px;
        }

        .chat-name {
            font: 700 15px Arial, sans-serif;
        }

        .chat-status {
            color: #397047;
            font: 11px Arial, sans-serif;
            margin-top: 4px;
        }

        .status-dot {
            display: inline-block;
            width: 7px;
            height: 7px;
            background: #5da56e;
            border-radius: 50%;
            margin-right: 5px;
        }

        .header-mark {
            background: var(--mint);
            color: var(--ink);
            padding: 9px 11px;
            font: 700 12px Arial, sans-serif;
            letter-spacing: .06em;
        }

        .chat-box {
            flex: 1;
            min-height: 430px;
            overflow-y: auto;
            padding: 28px 24px;
            background: #fbfcf9;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .welcome {
            color: var(--muted);
            font: 12px Arial, sans-serif;
            text-align: center;
            margin: 0 auto 10px;
        }

        .message {
            max-width: min(76%, 600px);
            padding: 13px 16px;
            border-radius: 2px 14px 14px 14px;
            font: 14px/1.55 Arial, sans-serif;
            white-space: pre-wrap;
            word-break: break-word;
            box-shadow: 0 2px 5px rgba(37, 60, 82, .04);
        }

        .message.user {
            align-self: flex-end;
            color: #fff;
            background: var(--navy);
            border-radius: 14px 2px 14px 14px;
        }

        .message.bot {
            align-self: flex-start;
            color: var(--ink);
            background: #e9f0e9;
        }

        .message.loading {
            color: var(--muted);
            font-style: italic;
        }

        .composer {
            border-top: 1px solid var(--line);
            padding: 18px 22px;
            background: #fff;
        }

        .composer-row {
            display: flex;
            gap: 10px;
        }

        .composer input {
            border: 1px solid var(--line);
            border-radius: 0;
            padding: 13px 14px;
            font: 14px Arial, sans-serif;
        }

        .composer input:focus {
            border-color: var(--navy);
            box-shadow: 0 0 0 3px rgba(37, 60, 82, .1);
        }

        .send-btn {
            border: 0;
            border-radius: 0;
            background: var(--coral);
            color: #fff;
            font: 700 13px Arial, sans-serif;
            padding: 0 22px;
        }

        .send-btn:hover {
            background: #c9654d;
            color: #fff;
        }

        .send-btn:disabled {
            opacity: .6;
        }

        .composer-hint {
            color: var(--muted);
            font: 11px Arial, sans-serif;
            margin: 9px 0 0;
        }

        @media (max-width: 800px) {
            .chat-layout {
                grid-template-columns: 1fr;
            }

            .chat-sidebar {
                display: none;
            }

            .chat-panel {
                min-height: 620px;
            }
        }

        @media (max-width: 520px) {
            .chat-page {
                padding: 30px 14px 45px;
            }

            .chat-intro {
                display: block;
            }

            .chat-header,
            .composer {
                padding-left: 15px;
                padding-right: 15px;
            }

            .chat-box {
                padding: 22px 15px;
            }

            .message {
                max-width: 88%;
            }

            .send-btn {
                padding: 0 15px;
            }
        }
    </style>
</head>

<body>
    <x-navbar></x-navbar>
    <main class="chat-page">
        <header class="chat-intro">
            <div><span class="eyebrow">Workspace / Assistant</span>
                <h1>Ask your store<br>anything.</h1>
                <p class="intro-copy">Your AI companion can help you understand your account, orders, products, and
                    store data.</p>
            </div><span class="header-mark">AI / ONLINE</span>
        </header>
        <div class="chat-layout">
            <aside class="chat-sidebar">
                <div class="assistant-badge">AI</div>
                <div class="sidebar-title">Try a starting point</div>
                <p class="sidebar-copy">Choose a prompt below or write your own question to begin a conversation.</p>
                <button class="prompt" type="button" data-prompt="Give me an overview of my store">Store
                    overview</button><button class="prompt" type="button"
                    data-prompt="Which products need attention?">Products to watch</button><button class="prompt"
                    type="button" data-prompt="Show me my recent orders">Recent orders</button>
                <p class="privacy-note">Responses are based on the data available to your account and role.</p>
            </aside>
            <section class="chat-panel" aria-label="AI chat assistant">
                <div class="chat-header">
                    <div>
                        <div class="chat-name">Store assistant</div>
                        <div class="chat-status"><span class="status-dot"></span>Ready to help</div>
                    </div>
                    <div class="header-mark">PRIVATE</div>
                </div>
                <div id="chatBox" class="chat-box">
                    <p class="welcome">Today &middot; Start a new conversation</p>
                    <div class="message bot">Hello! I’m your store assistant. How can I help you today?</div>
                </div>
                <div class="composer">
                    <form id="chatForm" class="composer-row"><input type="text" id="userInput" class="form-control"
                            placeholder="Ask about your store..." required autocomplete="off"
                            aria-label="Your message"><button type="submit" class="send-btn" id="sendBtn">Send
                            &rarr;</button></form>
                    <p class="composer-hint">Press send to receive an answer from your store assistant.</p>
                </div>
            </section>
        </div>
    </main>
    <x-bootstrap-js></x-bootstrap-js>
    <script>
        const chatForm = document.getElementById('chatForm');
    const userInput = document.getElementById('userInput');
    const chatBox = document.getElementById('chatBox');
    const sendBtn = document.getElementById('sendBtn');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    document.querySelectorAll('[data-prompt]').forEach((button) => {
        button.addEventListener('click', () => { userInput.value = button.dataset.prompt; userInput.focus(); });
    });

    chatForm.addEventListener('submit', async function (event) {
        event.preventDefault();
        const message = userInput.value.trim();
        if (!message) return;
        appendMessage(message, 'user');
        userInput.value = '';
        sendBtn.disabled = true;
        const loadingId = appendMessage('Thinking...', 'bot loading');
        try {
            const response = await fetch("{{ route('chat.send') }}", { method: 'POST', headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken }, body: JSON.stringify({ message }) });
            const data = await response.json();
            document.getElementById(loadingId)?.remove();
            appendMessage(response.ok ? data.reply : 'Error: ' + (data.error || 'Something went wrong.'), 'bot');
        } catch (error) {
            document.getElementById(loadingId)?.remove();
            appendMessage('Connection error. Please try again.', 'bot');
        } finally { sendBtn.disabled = false; userInput.focus(); }
    });

    function appendMessage(text, sender) {
        const messageElement = document.createElement('div');
        messageElement.id = 'msg-' + Date.now();
        messageElement.className = 'message ' + sender;
        messageElement.textContent = text;
        chatBox.appendChild(messageElement);
        chatBox.scrollTop = chatBox.scrollHeight;
        return messageElement.id;
    }
    </script>
</body>

</html>