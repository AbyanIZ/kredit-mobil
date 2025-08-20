<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kredit Mobil</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top:20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align:center; }
        th { background-color: #f4f4f4; }
        a { text-decoration:none; padding:6px 12px; border-radius:4px; }
        .btn-detail { background:#3498db; color:#fff; }
        .btn-back { background:#2ecc71; color:#fff; margin-bottom:15px; display:inline-block; }
    </style>
</head>
<body>
    <h2>Data Kredit Mobil</h2>

    <!-- Tombol Back ke Dashboard -->
    <a href="{{ route('dashboard') }}" class="btn-back">← Kembali ke Dashboard</a>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Pemohon</th>
                <th>Mobil</th>
                <th>DP</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kredits as $kredit)
                <tr>
                    <td>{{ $kredit->id }}</td>
                    <td>{{ $kredit->nama }}</td>
                    <td>{{ $kredit->mobil->name ?? '-' }}</td>
                    <td>Rp {{ number_format($kredit->dp, 0, ',', '.') }}</td>
                    <td>{{ $kredit->status ?? 'Pending' }}</td>
                    <td>
                        <a href="{{ route('kreditmobil.show', $kredit->id) }}" class="btn-detail">Detail</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
