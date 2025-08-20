<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-blue-900 text-white min-h-screen">
        <div class="p-6 text-2xl font-bold border-b border-blue-700">
            Admin Panel
        </div>
        <nav class="mt-4">
            <a href="{{ route('pengguna.index') }}" class="block px-6 py-3 hover:bg-blue-700">👥 Pengguna</a>
            <a href="{{ route('pendataanmobil.index') }}" class="block px-6 py-3 hover:bg-blue-700">🚗 Pendataan Mobil</a>
            <a href="{{route('kreditmobil.index')}}" class="block px-6 py-3 hover:bg-blue-700">🚗 Penerimaan Mobil</a>
            <a href="#" class="block px-6 py-3 hover:bg-blue-700">💳 Pendataan Kredit</a>
            <a href="#" class="block px-6 py-3 hover:bg-blue-700">🏷 Pendataan Merek</a>
            <a href="{{ route('laporanmobil.index') }}" class="block px-6 py-3 hover:bg-blue-700">📄 Laporan Mobil</a>
            <a href="#" class="block px-6 py-3 hover:bg-blue-700">📑 Laporan Kredit</a>
        </nav>
        <div class="absolute bottom-0 w-64 p-6 border-t border-blue-700">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-red-500 py-2 rounded-lg hover:bg-red-600">
                    Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <h1 class="text-3xl font-bold mb-4">Selamat Datang, {{ auth()->user()->name }}</h1>
        <p class="text-gray-600">Ini adalah halaman dashboard admin.</p>
</body>

</html>
