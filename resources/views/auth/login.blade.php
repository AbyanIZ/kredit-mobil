<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | Sitoko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }
        .video-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 1rem 0 0 1rem;
        }
        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: scale(1.02);
        }
        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .form-container {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        }
        .input-field {
            transition: all 0.3s ease;
            box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.05);
        }
        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }
        .login-btn {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px rgba(59, 130, 246, 0.3);
        }
        .login-btn:active {
            transform: translateY(0);
        }
        .brand-logo {
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }
        @media (max-width: 768px) {
            .video-container {
                height: 30vh;
                border-radius: 1rem 1rem 0 0;
            }
            .form-container {
                border-radius: 0 0 1rem 1rem;
            }
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <div class="w-full max-w-6xl mx-auto flex flex-col md:flex-row h-[90vh] md:h-[80vh] rounded-2xl overflow-hidden">
        <div class="md:w-1/2 w-full video-container">
            <video autoplay muted loop class="w-full h-full">
                <source src="https://cdn.pixabay.com/video/2023/09/21/181533-866999835_large.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
            <div class="video-overlay"></div>
            <div class="absolute top-8 left-8">
                <div class="flex items-center space-x-2">
                    <svg class="w-8 h-8 text-white brand-logo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    <span class="text-white font-bold text-xl">Sitoko</span>
                </div>
            </div>
            <div class="absolute bottom-8 left-8 text-white">
                <h2 class="text-3xl font-bold mb-2">Welcome Back!</h2>
                <p class="text-lg opacity-90">Streamline your business with our powerful admin tools</p>
            </div>
        </div>

        <div class="md:w-1/2 w-full bg-white p-8 md:p-12 flex items-center justify-center">
            <div class="w-full max-w-sm form-container bg-white p-8 rounded-xl">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-800 mb-2">Admin Login</h1>
                    <p class="text-gray-500">Enter your credentials to access the dashboard</p>
                </div>

                <div id="error-message" class="hidden bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded-lg mb-6 text-sm"></div>

                <form id="login-form" action="/login" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="mb-5">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-600">Email Address</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <input type="email" name="email" id="email"
                                   class="w-full pl-10 pr-4 py-3 input-field bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 transition"
                                   placeholder="admin@example.com"
                                   required>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-600">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <input type="password" name="password" id="password"
                                   class="w-full pl-10 pr-10 py-3 input-field bg-gray-50 border border-gray-200 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-400 transition"
                                   placeholder="••••••••"
                                   required>
                            <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600 transition">
                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <button type="submit" id="submit-button"
                            class="w-full login-btn text-white py-3 rounded-lg font-semibold flex items-center justify-center">
                        <span id="button-text">Login</span>
                        <svg id="loading-spinner" class="hidden h-5 w-5 animate-spin text-white ml-2" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('error')) {
            const errorMessage = urlParams.get('error');
            const errorDiv = document.getElementById('error-message');
            errorDiv.textContent = errorMessage || 'Invalid email or password.';
            errorDiv.classList.remove('hidden');
        }

        const passwordInput = document.getElementById('password');
        const togglePassword = document.getElementById('toggle-password');
        togglePassword.addEventListener('click', () => {
            const type = passwordInput.type === 'password' ? 'text' : 'password';
            passwordInput.type = type;
            togglePassword.innerHTML = type === 'password' ?
                `<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>` :
                `<svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.542 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" /></svg>`;
        });

        const form = document.getElementById('login-form');
        const submitButton = document.getElementById('submit-button');
        const buttonText = document.getElementById('button-text');
        const loadingSpinner = document.getElementById('loading-spinner');
        form.addEventListener('submit', () => {
            submitButton.disabled = true;
            buttonText.textContent = 'Authenticating...';
            loadingSpinner.classList.remove('hidden');
        });
    </script>
</body>
</html>
