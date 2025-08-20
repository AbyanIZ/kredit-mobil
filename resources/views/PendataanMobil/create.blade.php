<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Mobil</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { max-width: 600px; margin: auto; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 8px; margin-top: 5px; }
        button {
            margin-top: 15px;
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
        }
        button:hover { background-color: #218838; }
        .btn-back {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-back:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <h1>Tambah Mobil</h1>

    <a href="{{ route('pendataanmobil.index') }}" class="btn-back">← Kembali</a>


    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pendataanmobil.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Nama Mobil</label>
        <input type="text" id="name" name="name" required>

        <label for="merk_id">Merk</label>
        <select id="merk_id" name="merk_id" required>
            @foreach($merks as $merk)
                <option value="{{ $merk->id }}">{{ $merk->name }}</option>
            @endforeach
        </select>

        <label for="tipe_id">Tipe</label>
        <select id="tipe_id" name="tipe_id" required>
            @foreach($tipes as $tipe)
                <option value="{{ $tipe->id }}">{{ $tipe->name }}</option>
            @endforeach
        </select>

        <label for="harga">Harga</label>
        <input type="number" id="harga" name="harga" required>

        <label for="no_plat">No Plat</label>
        <input type="text" id="no_plat" name="no_plat" required>

        <label for="tahun">Tahun</label>
        <input type="number" id="tahun" name="tahun" required>

        <label for="image">Gambar Mobil</label>
        <input type="file" id="image" name="image">

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
