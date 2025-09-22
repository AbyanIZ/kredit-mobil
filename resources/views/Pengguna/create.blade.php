<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna | Sitoko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            min-height: 100vh;
        }

        .main-container {
            background: #f9fafb;
            min-height: 100vh;
            padding: 2rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .back-btn {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 8px rgba(107, 114, 128, 0.2);
            text-decoration: none;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
            background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
        }

        .submit-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 0.875rem 2rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 8px rgba(59, 130, 246, 0.2);
            width: 100%;
            justify-content: center;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 0.875rem;
            background: #fff;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background: #fefefe;
        }

        .form-input:hover {
            border-color: #d1d5db;
        }

        .form-select {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-size: 0.875rem;
            background: #fff;
            cursor: pointer;
        }

        .form-select:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .form-select:hover {
            border-color: #d1d5db;
        }

        .error-message {
            color: #ef4444;
            font-size: 0.75rem;
            margin-top: 0.375rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .page-header {
            display: flex;
            justify-content: between;
            align-items: flex-start;
            margin-bottom: 2rem;
            gap: 2rem;
        }

        .page-title {
            flex: 1;
        }

        .page-title h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .form-container {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
            padding: 2rem 2rem 0;
        }

        .form-header h2 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.5rem;
        }

        .form-header p {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .form-body {
            padding: 0 2rem 2rem;
        }

        .password-input-container {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6b7280;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #374151;
        }

        .role-option {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 0.75rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .role-option:hover {
            border-color: #3b82f6;
            background: #f8faff;
        }

        .role-option.selected {
            border-color: #3b82f6;
            background: #eff6ff;
        }

        .role-radio {
            margin-right: 1rem;
        }

        .role-info {
            flex: 1;
        }

        .role-title {
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.25rem;
        }

        .role-description {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .role-icon {
            font-size: 1.5rem;
            color: #6b7280;
            margin-right: 1rem;
        }

        .form-divider {
            height: 1px;
            background: #e5e7eb;
            margin: 2rem 0;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</head>
<body class="main-container">
    <div class="page-header">
        <div class="page-title">
            <h1>Tambah Pengguna Baru</h1>
            <p class="page-subtitle">Buat akun baru untuk pengguna atau administrator sistem</p>
        </div>
        <a href="{{ route('pengguna.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
    </div>

    <div class="form-container">
        <div class="card fade-in">
            <div class="form-header">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-user-plus text-white text-xl"></i>
                </div>
                <h2>Formulir Pengguna Baru</h2>
                <p>Lengkapi informasi di bawah ini untuk membuat akun pengguna baru</p>
            </div>

            <div class="form-body">
                <form action="{{ route('pengguna.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user mr-2 text-blue-500"></i>
                            Nama Lengkap
                        </label>
                        <input type="text" name="name" class="form-input" placeholder="Masukkan nama lengkap" value="{{ old('name') }}">
                        @error('name')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope mr-2 text-blue-500"></i>
                            Alamat Email
                        </label>
                        <input type="email" name="email" class="form-input" placeholder="contoh@email.com" value="{{ old('email') }}">
                        @error('email')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock mr-2 text-blue-500"></i>
                            Kata Sandi
                        </label>
                        <div class="password-input-container">
                            <input type="password" name="password" id="password" class="form-input" placeholder="Masukkan kata sandi yang aman">
                            <i class="fas fa-eye password-toggle" onclick="togglePassword('password')"></i>
                        </div>
                        @error('password')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-lock mr-2 text-blue-500"></i>
                            Konfirmasi Kata Sandi
                        </label>
                        <div class="password-input-container">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="Ulangi kata sandi">
                            <i class="fas fa-eye password-toggle" onclick="togglePassword('password_confirmation')"></i>
                        </div>
                    </div>

                    <div class="form-divider"></div>

                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user-tag mr-2 text-blue-500"></i>
                            Pilih Role Pengguna
                        </label>

                        <div class="role-option {{ old('role') == 'user' ? 'selected' : '' }}" onclick="selectRole('user')">
                            <input type="radio" name="role" value="user" class="role-radio" {{ old('role') == 'user' ? 'checked' : '' }}>
                            <i class="fas fa-user role-icon text-blue-500"></i>
                            <div class="role-info">
                                <div class="role-title">Pengguna Regular</div>
                                <div class="role-description">Akses terbatas untuk menggunakan fitur-fitur dasar sistem</div>
                            </div>
                        </div>

                        <div class="role-option {{ old('role') == 'admin' ? 'selected' : '' }}" onclick="selectRole('admin')">
                            <input type="radio" name="role" value="admin" class="role-radio" {{ old('role') == 'admin' ? 'checked' : '' }}>
                            <i class="fas fa-user-shield role-icon text-purple-500"></i>
                            <div class="role-info">
                                <div class="role-title">Administrator</div>
                                <div class="role-description">Akses penuh untuk mengelola sistem dan semua data</div>
                            </div>
                        </div>

                        @error('role')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="submit-btn">
                            <i class="fas fa-save"></i>
                            Simpan Pengguna
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = field.nextElementSibling;

            if (field.type === 'password') {
                field.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function selectRole(roleValue) {
            document.querySelectorAll('.role-option').forEach(option => {
                option.classList.remove('selected');
            });

            event.currentTarget.classList.add('selected');

            document.querySelector(`input[value="${roleValue}"]`).checked = true;
        }

        document.querySelector('form').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;

            if (password !== passwordConfirmation) {
                e.preventDefault();
                alert('Kata sandi dan konfirmasi kata sandi tidak cocok!');
            }
        });

        document.querySelectorAll('.form-input, .form-select').forEach(input => {
            input.addEventListener('focus', function() {
                this.style.transform = 'translateY(-1px)';
            });

            input.addEventListener('blur', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>
