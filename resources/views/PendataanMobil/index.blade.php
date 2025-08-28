<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Mobil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table,
        th,
        td {
            border: 1px solid #555;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        h1 {
            text-align: center;
        }

        .empty {
            text-align: center;
            color: gray;
        }

        .btn-back,
        .btn-create {
            display: inline-block;
            margin-bottom: 15px;
            padding: 8px 15px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-back:hover,
        .btn-create:hover {
            background-color: #0056b3;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .btn-edit {
            padding: 5px 10px;
            background-color: #ffc107;
            color: white;
            text-decoration: none;
            border-radius: 3px;
        }

        .btn-edit:hover {
            background-color: #e0a800;
        }

        .btn-delete {
            padding: 5px 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .btn-disabled {
            padding: 5px 10px;
            background-color: gray;
            color: white;
            border-radius: 3px;
            cursor: not-allowed;
            opacity: 0.7;
        }

        .btn-group {
            display: flex;
            gap: 5px;
        }
    </style>
</head>

<body>
    <h1>Pendataan Mobil</h1>

    <div class="actions">
        <a href="{{ url('/dashboard') }}" class="btn-back">← Kembali ke Dashboard</a>
        <a href="{{ route('pendataanmobil.create') }}" class="btn-create">+ Create Mobil</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>Image</th>
                <th>Nama</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Tahun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mobils as $mobil)
                <tr>
                    <td>
                        @if ($mobil->image)
                            <img src="{{ asset('storage/' . $mobil->image) }}"
                                 alt="{{ $mobil->name }}"
                                 style="width: 50px; height: auto;">
                        @else
                            <span>No Image</span>
                        @endif
                    </td>
                    <td>{{ $mobil->name }}</td>
                    <td>{{ $mobil->merk->name ?? '-' }}</td>
                    <td>{{ $mobil->tipe->name ?? '-' }}</td>
                    <td>Rp {{ number_format($mobil->harga, 0, ',', '.') }}</td>
                    <td>
                        @if ($mobil->status === 'available')
                            <span style="color: green; font-weight: bold;">Available</span>
                        @else
                            <span style="color: red; font-weight: bold;">Unavailable</span>
                        @endif
                    </td>
                    <td>{{ $mobil->tahun }}</td>
                    <td>
                        <div class="btn-group">
                            @if ($mobil->status === 'available')
                                <a href="{{ route('pendataanmobil.edit', $mobil->id) }}" class="btn-edit">Edit</a>
                                <form action="{{ route('pendataanmobil.destroy', $mobil->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin mau hapus mobil ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-delete">Hapus</button>
                                </form>
                            @else
                                <span class="btn-disabled">Tidak tersedia</span>
                            @endif
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="empty">Tidak ada data mobil</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
