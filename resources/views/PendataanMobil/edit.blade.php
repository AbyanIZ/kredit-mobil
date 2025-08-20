<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mobil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select {
            padding: 8px;
            width: 100%;
            margin-top: 5px;
        }
        .btn-submit {
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .btn-back {
            display: inline-block;
            margin-top: 10px;
            padding: 6px 12px;
            background: #6c757d;
            color: white;
            text-decoration: none;
        }
        .current-img {
            margin-top: 10px;
        }
        .error-messages {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <h1>Edit Mobil</h1>

    <a href="{{ route('pendataanmobil.index') }}" class="btn-back">← Kembali</a>

    {{-- Tampilkan error validasi --}}
    @if ($errors->any())
        <div class="error-messages">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pendataanmobil.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label>Nama Mobil</label>
        <input type="text" name="name" value="{{ old('name', $mobil->name) }}" required>

        <label>Merk</label>
        <select name="merk_id" required>
            <option value="">-- Pilih Merk --</option>
            @foreach($merks as $merk)
                <option value="{{ $merk->id }}" {{ $mobil->merk_id == $merk->id ? 'selected' : '' }}>
                    {{ $merk->name }}
                </option>
            @endforeach
        </select>

        <label>Tipe</label>
        <select name="tipe_id" required>
            <option value="">-- Pilih Tipe --</option>
            @foreach($tipes as $tipe)
                <option value="{{ $tipe->id }}" {{ $mobil->tipe_id == $tipe->id ? 'selected' : '' }}>
                    {{ $tipe->name }}
                </option>
            @endforeach
        </select>

        <label>Harga</label>
        <input type="number" name="harga" value="{{ old('harga', $mobil->harga) }}" required>

        <label>No. Plat</label>
        <input type="text" name="no_plat" value="{{ old('no_plat', $mobil->no_plat) }}" required>

        <label>Tahun</label>
        <input type="number" name="tahun" value="{{ old('tahun', $mobil->tahun) }}" required>

        <label>Gambar Mobil (opsional)</label>
        <input type="file" name="image">

        @if($mobil->image)
            <div class="current-img">
                <p>Gambar saat ini:</p>
                <img src="{{ asset('storage/' . $mobil->image) }}" width="200">
            </div>
        @endif

        <button type="submit" class="btn-submit">Update</button>
    </form>

    <script>
        // Batas maksimal harga
        const MAX_HARGA = 2000000000; // 2 miliar

        document.querySelector('input[name="harga"]').addEventListener('input', function() {
            let harga = parseInt(this.value);
            if (harga > MAX_HARGA) {
                alert("⚠️ Harga tidak boleh lebih dari 2 miliar!");
                this.value = MAX_HARGA;
            }
        });
    </script>

</body>
</html>
