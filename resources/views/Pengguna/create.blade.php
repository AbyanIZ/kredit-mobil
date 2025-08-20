<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <!-- Tombol Back -->
    <div class="mb-6">
        <a href="{{ route('pengguna.index') }}"
           class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600">
            Kembali
        </a>
    </div>

    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold mb-6">Tambah Pengguna</h2>

        <form action="{{ route('pengguna.store') }}" method="POST">
            @csrf

            <!-- Nama -->
            <div class="mb-4">
                <label class="block text-gray-700">Nama</label>
                <input type="text" name="name"
                       class="w-full px-3 py-2 border rounded"
                       value="{{ old('name') }}">
                @error('name')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700">Email</label>
                <input type="email" name="email"
                       class="w-full px-3 py-2 border rounded"
                       value="{{ old('email') }}">
                @error('email')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-700">Sandi</label>
                <input type="password" name="password"
                       class="w-full px-3 py-2 border rounded">
                @error('password')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Konfirmasi Password -->
            <div class="mb-4">
                <label class="block text-gray-700">Konfirmasi Sandi</label>
                <input type="password" name="password_confirmation"
                       class="w-full px-3 py-2 border rounded">
            </div>

            <!-- Role -->
            <div class="mb-4">
                <label class="block text-gray-700">Role</label>
                <select name="role" class="w-full px-3 py-2 border rounded">
                    <option value="">-- Pilih Role --</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                @error('role')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <div>
                <button type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                    Simpan
                </button>
            </div>
        </form>
    </div>

</body>
</html>
