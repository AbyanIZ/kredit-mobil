<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laporan Mobil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 10px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 15px;
            margin: 5px 0;
            background: green;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background: darkgreen;
        }
        .btn-back {
            background: gray;
        }
        .btn-back:hover {
            background: darkgray;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
        .status-available {
            color: green;
            font-weight: bold;
        }
        .status-unavailable {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Laporan Mobil</h1>

    <div class="header">
        <a href="{{ url()->previous() }}" class="btn btn-back">⬅️ Back</a>
        <a href="{{ route('laporan.mobil.export') }}" class="btn">📥 Download Excel</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mobil</th>
                <th>Merk</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Status</th>
                <th>Tahun</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($mobils as $mobil)
                <tr>
                    <td>{{ $mobil->id }}</td>
                    <td>{{ $mobil->name }}</td>
                    <td>{{ $mobil->merk->name ?? '-' }}</td>
                    <td>{{ $mobil->tipe->name ?? '-' }}</td>
                    <td>Rp {{ number_format($mobil->harga, 0, ',', '.') }}</td>
                    <td>
                        @if ($mobil->status === 'available')
                            <span class="status-available">Available</span>
                        @else
                            <span class="status-unavailable">Unavailable</span>
                        @endif
                    </td>
                    <td>{{ $mobil->tahun }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">Tidak ada data mobil</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
