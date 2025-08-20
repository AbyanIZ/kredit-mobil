<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Merek</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold">Daftar Merek</h1>
      <div class="flex space-x-2">
        <a href="{{ route('dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">← Kembali</a>
        <a href="{{ route('merek.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Tambah Merek</a>
      </div>
    </div>

    <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
      <thead>
        <tr class="bg-gray-200 text-left">
          <th class="p-3">No</th>
          <th class="p-3">Nama</th>
          <th class="p-3">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($mereks as $index => $merek)
        <tr class="border-t">
          <td class="p-3">{{ $index+1 }}</td>
          <td class="p-3">{{ $merek->name }}</td>
          <td class="p-3 flex space-x-2">
            <a href="{{ route('merek.edit', $merek->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
            <form action="{{ route('merek.destroy', $merek->id) }}" method="POST" onsubmit="return confirm('Yakin hapus merek ini?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
            </form>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="3" class="p-3 text-center text-gray-500">Belum ada data merek.</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</body>
</html>
