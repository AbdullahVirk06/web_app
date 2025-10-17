document.addEventListener('DOMContentLoaded', () => {
    // --- Mobile Menu Toggle ---
    const menuToggle = document.getElementById('menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            // Toggle icon
            const icon = menuToggle.querySelector('i');
            if (mobileMenu.classList.contains('active')) {
                icon.classList.remove('fa-bars');
                icon.classList.add('fa-times'); // 'X' icon when open
            } else {
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars'); // Hamburger icon when closed
            }
        });

        // Close mobile menu when a link is clicked
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                menuToggle.querySelector('i').classList.remove('fa-times');
                menuToggle.querySelector('i').classList.add('fa-bars');
            });
        });
    }

    // --- Chatbot Logic ---
    const chatbotToggleBtn = document.getElementById('chatbot-toggle-btn');
    const chatbotWindow = document.getElementById('chatbot-window');
    const chatbotCloseBtn = document.getElementById('chatbot-close-btn');
    const chatbotMessages = document.getElementById('chatbot-messages');
    const chatbotInput = document.getElementById('chatbot-input');
    const chatbotSendBtn = document.getElementById('chatbot-send-btn');

    if (chatbotToggleBtn && chatbotWindow && chatbotCloseBtn && chatbotMessages && chatbotInput && chatbotSendBtn) {
        // Toggle chatbot window
        chatbotToggleBtn.addEventListener('click', () => {
            chatbotWindow.classList.toggle('active');
            if (chatbotWindow.classList.contains('active')) {
                chatbotInput.focus(); // Focus on input when opened
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight; // Scroll to bottom
            }
        });

        // Close chatbot window
        chatbotCloseBtn.addEventListener('click', () => {
            chatbotWindow.classList.remove('active');
        });

        // Function to add message to chat display
        function addMessage(message, sender) {
            const messageDiv = document.createElement('div');
            messageDiv.classList.add('message', `${sender}-message`);
            messageDiv.innerHTML = message; // Use innerHTML to allow for links from bot responses
            chatbotMessages.appendChild(messageDiv);
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight; // Scroll to bottom
        }

        // Function to send message to PHP backend
        function sendMessage() {
            const message = chatbotInput.value.trim();
            if (message === '') return; // Don't send empty messages

            addMessage(message, 'user'); // Display user's message
            chatbotInput.value = ''; // Clear input field

            // AJAX call to PHP backend for chatbot response
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '<?php echo BASE_URL; ?>chatbot_api.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) { // Request is complete
                    if (xhr.status === 200) { // HTTP status OK
                        try {
                            const response = JSON.parse(xhr.responseText);
                            addMessage(response.response, 'bot'); // Display bot's response
                        } catch (e) {
                            console.error('Error parsing JSON response from chatbot_api.php:', e);
                            addMessage("Oops! MyK Assistant is having trouble understanding. Please try again or visit our <a href='<?php echo BASE_URL; ?>contact.php'>Contact Us</a> page.", 'bot');
                        }
                    } else {
                        console.error('AJAX Error:', xhr.status, xhr.statusText);
                        addMessage("Oops! There was a network error. Please try again.", 'bot');
                    }
                }
            };
            xhr.send('message=' + encodeURIComponent(message)); // Send user's message
        }

        // Event listeners for sending messages
        chatbotSendBtn.addEventListener('click', sendMessage);
        chatbotInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });
    }

    // --- Active navigation link highlighting (optional, for client/admin panels) ---
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.main-nav a, .mobile-menu a, .sidebar a');

    navLinks.forEach(link => {
        // Normalize paths for comparison (e.g., remove BASE_URL, trailing slashes, index.php)
        let linkHref = link.href.replace(window.location.origin + '<?php echo rtrim(str_replace('index.php', '', BASE_URL), '/'); ?>', '');
        let currentCleanPath = currentPath.replace('<?php echo rtrim(str_replace('index.php', '', BASE_URL), '/'); ?>', '').replace('index.php', '').replace(/\/$/, '');

        // Handle specific page comparison (e.g., /services.php vs /service_details.php?type=air)
        if (linkHref.includes('services.php') && currentCleanPath.includes('service_details.php')) {
            // Keep active on Services if any service detail is open
            link.classList.add('active');
        } else if (linkHref === currentCleanPath || (linkHref === '' && currentCleanPath === '/')) {
            link.classList.add('active');
        }
    });

    // --- Dynamic Quote Price Field (Admin Manage Quotes) ---
    // This script is also embedded directly in admin/manage_quotes.php for immediate effect.
    // However, it's good practice to have it here if needed globally or for consistency.
    // For this project, the one in manage_quotes.php is sufficient.

});
