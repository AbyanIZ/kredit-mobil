<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">

    <!-- Tombol Back -->
    <div class="mb-6">
        <a href="{{ route('dashboard') }}"
           class="inline-block px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
            ⬅ Kembali ke Dashboard
        </a>
    </div>

    <h1 class="text-3xl font-bold mb-6">Manajemen Pengguna</h1>

    <!-- Tab Menu -->
    <div class="mb-6 flex space-x-4">
        <button id="tabUser" class="px-4 py-2 bg-blue-600 text-white rounded">User</button>
        <button id="tabAdmin" class="px-4 py-2 bg-gray-300 rounded">Admin</button>
    </div>

    <!-- Tabel User -->
    <div id="contentUser">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Daftar User</h2>
                <a href="{{ route('pengguna.create') }}"
                   class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    ➕ Tambah Pengguna
                </a>
            </div>
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Role</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td class="border px-4 py-2">{{ $user->name }}</td>
                        <td class="border px-4 py-2">{{ $user->email }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($user->role) }}</td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <a href="{{ route('pengguna.edit', $user->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                ✏ Edit
                            </a>
                            <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus pengguna ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    🗑 Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="contentAdmin" class="hidden">
        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Daftar Admin</h2>
                <a href="{{ route('pengguna.create') }}"
                   class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    ➕ Tambah Pengguna
                </a>
            </div>
            <table class="w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Role</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                    <tr>
                        <td class="border px-4 py-2">{{ $admin->name }}</td>
                        <td class="border px-4 py-2">{{ $admin->email }}</td>
                        <td class="border px-4 py-2">{{ ucfirst($admin->role) }}</td>
                        <td class="border px-4 py-2 flex space-x-2">
                            <a href="{{ route('pengguna.edit', $admin->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                ✏ Edit
                            </a>
                            <form action="{{ route('pengguna.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Yakin hapus admin ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    🗑 Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const tabUser = document.getElementById('tabUser');
        const tabAdmin = document.getElementById('tabAdmin');
        const contentUser = document.getElementById('contentUser');
        const contentAdmin = document.getElementById('contentAdmin');

        tabUser.addEventListener('click', () => {
            tabUser.classList.add('bg-blue-600', 'text-white');
            tabUser.classList.remove('bg-gray-300');
            tabAdmin.classList.remove('bg-blue-600', 'text-white');
            tabAdmin.classList.add('bg-gray-300');

            contentUser.classList.remove('hidden');
            contentAdmin.classList.add('hidden');
        });

        tabAdmin.addEventListener('click', () => {
            tabAdmin.classList.add('bg-blue-600', 'text-white');
            tabAdmin.classList.remove('bg-gray-300');
            tabUser.classList.remove('bg-blue-600', 'text-white');
            tabUser.classList.add('bg-gray-300');

            contentAdmin.classList.remove('hidden');
            contentUser.classList.add('hidden');
        });
    </script>

</body>
</html>
