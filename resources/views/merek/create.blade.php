<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Merek</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <div class="container mx-auto p-6 max-w-lg">
    <div class="flex justify-between items-center mb-4">
      <h1 class="text-2xl font-bold">Tambah Merek Baru</h1>
    </div>

    <form action="{{ route('merek.store') }}" method="POST" class="space-y-4 bg-white p-4 rounded shadow">
      @csrf
      <div>
        <label class="block mb-1 font-semibold">Nama Merek</label>
        <input type="text" name="name" class="w-full border rounded p-2" required>
      </div>
      <div class="flex justify-end space-x-2">
        <a href="{{ route('merek.index') }}" class="px-4 py-2 border rounded">Batal</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
      </div>
    </form>
  </div>
</body>
</html>
