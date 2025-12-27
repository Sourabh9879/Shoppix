<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <style>
    body {
        display: flex;
        min-height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background-color: #1f2937;
        color: white;
        display: flex;
        flex-direction: column;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
        position: fixed;
        height: 100%;
        overflow-y: auto;
    }

    .sidebar h4 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #e5e7eb;
    }

    .sidebar a {
        color: #e5e7eb;
        text-decoration: none;
        padding: 12px 15px;
        display: flex;
        align-items: center;
        border-radius: 5px;
        transition: background 0.3s ease-in-out;
        font-size: 1rem;
    }

    .sidebar a:hover {
        background-color: #374151;
    }

    .sidebar span {
        margin-right: 10px;
        font-size: 1.4rem;
        color: #9ca3af;
    }

    /* Content */
    .content {
        flex: 1;
        padding: 20px;
        margin-left: 250px;
        /* Same as sidebar width */
        overflow-y: auto;
        height: 100vh;
    }

    /* Header */
    .header {
        background-color: #1f2937;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #374151;
        padding: 8px 15px;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .header .user-info:hover {
        background: #4b5563;
    }

    .header .user-info img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 2px solid #4b5563;
    }

    /* Sidebar Links */
    .sidebar .d-flex {
        align-items: center;
        padding: 10px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .sidebar .d-flex:hover {
        background-color: #374151;
    }

    .sidebar .d-flex:hover a,
    .sidebar .d-flex:hover .material-symbols-outlined {
        color: #fff;
    }

    .sidebar .d-flex.active {
        background-color: #374151; /* Highlight color */
        color: white;
    }

    .sidebar .d-flex.active a {
        color: white;
        font-weight: bold;
    }

    /* Logout Button */
    .sidebar .logout {
        background-color: #ef4444;
        color: white;
        padding: 10px 15px;
        width: 100%;
        text-align: center;
        border-radius: 5px;
        font-weight: bold;
        transition: all 0.3s;
        margin-top: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .sidebar .logout:hover {
        background-color: #dc2626;
        transform: translateY(-2px);
    }

    /* Card Styles */
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    /* Button Styles */
    .btn-primary {
        background-color: #3b82f6;
        border-color: #3b82f6;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #2563eb;
        border-color: #2563eb;
        transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .sidebar {
            width: 80px;
            padding: 1rem 0.5rem;
        }

        .sidebar h4,
        .sidebar-link span:not(.material-symbols-outlined) {
            display: none;
        }

        .sidebar-link {
            justify-content: center;
            padding: 0.875rem;
        }

        .sidebar-link .material-symbols-outlined {
            margin: 0;
            font-size: 1.5rem;
        }

        .content {
            padding: 1rem;
        }

        .header {
            padding: 1rem;
        }

        .user-info span:not(.material-symbols-outlined) {
            display: none;
        }
    }

    /* Product Card Styles */
    .product-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
        transition: box-shadow 0.2s ease;
    }

    .product-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .product-card .image-container {
        position: relative;
        height: 200px;
        background: #f9fafb;
    }

    .product-card .image-container img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 1rem;
    }

    .product-card .badge {
        position: absolute;
        top: 12px;
        right: 12px;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        background: #1f2937;
        color: white;
    }

    .product-card .card-content {
        padding: 16px;
    }

    .product-card .title {
        font-size: 16px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .product-card .price {
        font-size: 18px;
        font-weight: 700;
        color: #2563eb;
        margin-bottom: 8px;
    }

    .product-card .description {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card .info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 16px;
        background: #f9fafb;
        border-top: 1px solid #e5e7eb;
    }

    .product-card .category {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        color: #4b5563;
    }

    .product-card .seller {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        color: #4b5563;
    }

    .product-card .actions {
        padding: 16px;
        border-top: 1px solid #e5e7eb;
    }

    .product-card .btn {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
    }

    .product-card .btn-group {
        display: flex;
        gap: 8px;
    }

    .product-card .btn-group .btn {
        flex: 1;
    }

    /* Product Grid */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        padding: 24px 0;
    }

    @media (max-width: 768px) {
        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 16px;
            padding: 16px 0;
        }
    }

    /* AI Chatbot Widget Styles */
    #chatbot-button {
        position: fixed;
        bottom: 30px;
        right: 30px;
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        z-index: 1000;
        transition: all 0.3s ease;
    }

    #chatbot-button:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
    }

    #chatbot-button span {
        color: white;
        font-size: 28px;
    }

    #chatbot-widget {
        position: fixed;
        bottom: 100px;
        right: 30px;
        width: 380px;
        height: 550px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        display: none;
        flex-direction: column;
        z-index: 1000;
        overflow: hidden;
    }

    #chatbot-widget.active {
        display: flex;
    }

    .chatbot-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .chatbot-header h5 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
    }

    .chatbot-close {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .chatbot-close:hover {
        background: rgba(255, 255, 255, 0.3);
    }

    .chatbot-messages {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        background: #f8f9fa;
    }

    .chatbot-message {
        margin-bottom: 15px;
        display: flex;
        align-items: flex-start;
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .chatbot-message.user {
        flex-direction: row-reverse;
    }

    .chatbot-message .message-content {
        max-width: 70%;
        padding: 12px 16px;
        border-radius: 15px;
        word-wrap: break-word;
    }

    .chatbot-message.user .message-content {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-bottom-right-radius: 5px;
    }

    .chatbot-message.bot .message-content {
        background: white;
        color: #333;
        border: 1px solid #e5e7eb;
        border-bottom-left-radius: 5px;
    }

    .chatbot-input-area {
        padding: 15px;
        background: white;
        border-top: 1px solid #e5e7eb;
        display: flex;
        gap: 10px;
    }

    #chatbot-input {
        flex: 1;
        padding: 12px 15px;
        border: 1px solid #e5e7eb;
        border-radius: 25px;
        outline: none;
        font-size: 14px;
        transition: all 0.2s;
    }

    #chatbot-input:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    #chatbot-send {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    #chatbot-send:hover {
        transform: scale(1.05);
    }

    #chatbot-send:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }

    .typing-indicator {
        display: flex;
        gap: 5px;
        padding: 12px 16px;
        background: white;
        border-radius: 15px;
        border: 1px solid #e5e7eb;
        width: fit-content;
    }

    .typing-indicator span {
        width: 8px;
        height: 8px;
        background: #667eea;
        border-radius: 50%;
        animation: typing 1.4s infinite;
    }

    .typing-indicator span:nth-child(2) {
        animation-delay: 0.2s;
    }

    .typing-indicator span:nth-child(3) {
        animation-delay: 0.4s;
    }

    @keyframes typing {
        0%, 60%, 100% {
            transform: translateY(0);
        }
        30% {
            transform: translateY(-10px);
        }
    }

    @media (max-width: 768px) {
        #chatbot-widget {
            width: calc(100vw - 20px);
            right: 10px;
            left: 10px;
            height: 500px;
        }
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="sidebar">
        <h4>Shoppix</h4>
        <div class="d-flex {{ Route::currentRouteName() == 'userdash' ? 'active' : '' }}">
            <span class="material-symbols-outlined">home</span>
            <a href="{{ route('userdash') }}" class="">Dashboard</a>
        </div>
        <div class="d-flex {{ Route::currentRouteName() == 'myproducts' ? 'active' : '' }}">
            <span class="material-symbols-outlined">inventory</span>
            <a href="{{ route('myproducts') }}" class="">My Products</a>
        </div>

        <div class="d-flex {{ Route::currentRouteName() == 'userproducts' ? 'active' : '' }}">
            <span class="material-symbols-outlined">format_list_bulleted</span>
            <a href="{{ route('userproducts') }}">Products</a>
        </div>

        @if(session('status') === 1)
        <div class="d-flex {{ Route::currentRouteName() == 'addProduct' ? 'active' : '' }}">
            <span class="material-symbols-outlined">add_task</span>
            <a href="{{ route('addProduct') }}">Sell</a>
        </div>
        @endif

        <div class="d-flex {{ Route::currentRouteName() == 'cart' ? 'active' : '' }}">
            <span class="material-symbols-outlined">favorite</span>
            <a href="{{ route('cart') }}">Wishlist</a>
        </div>

        <div class="d-flex {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}">
            <span class="material-symbols-outlined">manage_accounts</span>
            <a href="{{ route('profile',['id' => session('user_id')]) }}">Profile</a>
        </div>
        <div class="d-flex {{ Route::currentRouteName() == 'offer' ? 'active' : '' }}">
            <span class="material-symbols-outlined">local_offer</span>
            <a href="{{ route('offer') }}">Offer</a>
        </div>
        <div class="d-flex position-relative {{ Route::currentRouteName() == 'message' ? 'active' : '' }}">
            <span class="material-symbols-outlined">mail</span>
            <a href="{{ route('message') }}" style="position: relative;">
                Message
                @if(auth()->user()->new_message > 0)
                <span
                class="ms-3"
                    style="background-color: red; color: white; border-radius: 50%; padding: 2px 7px; font-size: 14px; box-shadow: 0 0 10px rgba(255, 0, 0, 0.6);">
                    {{ auth()->user()->new_message }}
                </span>
                @endif
            </a>
        </div>
        <div class="d-flex">
            <a href="{{ route('logout') }}" class="logout">
                <span class="material-symbols-outlined">logout</span> Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="header">
            <h2>@yield('heading')</h2>
            <div class="user-info">
                @if(session('user_image'))
                <img src="{{ asset('storage/' . session('user_image')) }}" alt="User Image">
                @else
                <span class="material-symbols-outlined">account_circle</span>
                @endif
                <a href="" class="text-white">@yield('name')</a>
            </div>
        </div>

        @yield('content')
    </div>

    <!-- AI Chatbot Widget -->
    <div id="chatbot-button">
        <span class="material-symbols-outlined">support_agent</span>
    </div>

    <div id="chatbot-widget">
        <div class="chatbot-header">
            <h5>🤖 Shoppix AI Support</h5>
            <button class="chatbot-close">
                <span class="material-symbols-outlined">close</span>
            </button>
        </div>
        <div class="chatbot-messages" id="chatbot-messages">
            <div class="chatbot-message bot">
                <div class="message-content">
                    Hi! 👋 I'm your Shoppix AI assistant. How can I help you today?
                </div>
            </div>
        </div>
        <div class="chatbot-input-area">
            <input type="text" id="chatbot-input" placeholder="Type your message..." />
            <button id="chatbot-send">
                <span class="material-symbols-outlined">send</span>
            </button>
        </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Chatbot functionality
        $(document).ready(function() {
            const chatbotButton = $('#chatbot-button');
            const chatbotWidget = $('#chatbot-widget');
            const chatbotClose = $('.chatbot-close');
            const chatbotMessages = $('#chatbot-messages');
            const chatbotInput = $('#chatbot-input');
            const chatbotSend = $('#chatbot-send');
            
            let isLoading = false;

            // Toggle chatbot widget
            chatbotButton.on('click', function() {
                chatbotWidget.toggleClass('active');
                if (chatbotWidget.hasClass('active')) {
                    loadChatHistory();
                    chatbotInput.focus();
                }
            });

            chatbotClose.on('click', function() {
                chatbotWidget.removeClass('active');
            });

            // Load chat history
            function loadChatHistory() {
                $.ajax({
                    url: '{{ route("chatbot.history") }}',
                    method: 'GET',
                    success: function(response) {
                        if (response.success && response.chats.length > 0) {
                            chatbotMessages.empty();
                            response.chats.forEach(function(chat) {
                                appendMessage(chat.message, 'user', false);
                                appendMessage(chat.response, 'bot', false);
                            });
                            scrollToBottom();
                        }
                    }
                });
            }

            // Send message
            function sendMessage() {
                const message = chatbotInput.val().trim();
                
                if (!message || isLoading) return;
                
                // Display user message
                appendMessage(message, 'user');
                chatbotInput.val('');
                
                // Show typing indicator
                isLoading = true;
                chatbotSend.prop('disabled', true);
                showTypingIndicator();
                
                // Send to backend
                $.ajax({
                    url: '{{ route("chatbot.send") }}',
                    method: 'POST',
                    data: {
                        message: message,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        hideTypingIndicator();
                        if (response.success) {
                            appendMessage(response.response, 'bot');
                        } else {
                            appendMessage('Sorry, I encountered an error. Please try again.', 'bot');
                        }
                    },
                    error: function() {
                        hideTypingIndicator();
                        appendMessage('Sorry, I\'m having trouble connecting. Please try again later.', 'bot');
                    },
                    complete: function() {
                        isLoading = false;
                        chatbotSend.prop('disabled', false);
                        chatbotInput.focus();
                    }
                });
            }

            // Append message to chat
            function appendMessage(text, type, animate = true) {
                const messageDiv = $('<div>')
                    .addClass('chatbot-message')
                    .addClass(type);
                
                const contentDiv = $('<div>')
                    .addClass('message-content')
                    .text(text);
                
                messageDiv.append(contentDiv);
                
                if (!animate) {
                    messageDiv.css('animation', 'none');
                }
                
                chatbotMessages.append(messageDiv);
                scrollToBottom();
            }

            // Show typing indicator
            function showTypingIndicator() {
                const typingDiv = $('<div>')
                    .addClass('chatbot-message bot typing-message');
                
                const indicator = $('<div>')
                    .addClass('typing-indicator')
                    .html('<span></span><span></span><span></span>');
                
                typingDiv.append(indicator);
                chatbotMessages.append(typingDiv);
                scrollToBottom();
            }

            // Hide typing indicator
            function hideTypingIndicator() {
                $('.typing-message').remove();
            }

            // Scroll to bottom
            function scrollToBottom() {
                chatbotMessages.scrollTop(chatbotMessages[0].scrollHeight);
            }

            // Event listeners
            chatbotSend.on('click', sendMessage);
            
            chatbotInput.on('keypress', function(e) {
                if (e.which === 13) {
                    sendMessage();
                }
            });
        });
    </script>
</body>

</html>