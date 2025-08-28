<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Detail Kredit Mobil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        img {
            max-width: 300px;
            margin: 10px 0;
            border-radius: 6px;
        }

        .btn {
            padding: 8px 16px;
            margin-right: 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-success {
            background: green;
            color: #fff;
        }

        .btn-danger {
            background: red;
            color: #fff;
        }

        .btn-back {
            background: #555;
            color: #fff;
            text-decoration: none;
            display: inline-block;
        }

        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            color: #fff;
        }

        .badge-pending {
            background: orange;
        }

        .badge-done {
            background: green;
        }

        .badge-reject {
            background: red;
        }

        .status-message {
            margin-top: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h2>Detail Kredit Mobil</h2>

    <h3>Data Pemohon</h3>
    <p><strong>Nama:</strong> {{ $kredit->nama }}</p>
    <p><strong>Tanggal Kredit:</strong> {{ $kredit->tanggal_kredit }}</p>
    <p><strong>Bunga:</strong> {{ $kredit->bunga }}%</p>
    <p><strong>DP:</strong> Rp {{ number_format($kredit->dp, 0, ',', '.') }}</p>
    <p><strong>Metode Pembayaran:</strong> {{ $kredit->metode_pembayaran }}</p>
    <p>
        <strong>Status:</strong>
        @php
            $status = $kredit->status ?? 'pending';
        @endphp
        <span class="badge badge-{{ $status }}">
            {{ ucfirst($status) }}
        </span>
    </p>

    <h3>Foto Dokumen</h3>
    @if ($kredit->foto_ktp)
        <p>KTP:</p>
        <img src="{{ asset('storage/' . $kredit->foto_ktp) }}" alt="Foto KTP">
    @endif
    @if ($kredit->foto_kk)
        <p>KK:</p>
        <img src="{{ asset('storage/' . $kredit->foto_kk) }}" alt="Foto KK">
    @endif

    <h3>Data Mobil</h3>
    @if ($kredit->mobil)
        <p><strong>Nama Mobil:</strong> {{ $kredit->mobil->name }}</p>
        <p><strong>Merk:</strong> {{ $kredit->mobil->merk->name ?? '-' }}</p>
        <p><strong>Tipe:</strong> {{ $kredit->mobil->tipe->name ?? '-' }}</p>
        <p><strong>Tanggal Kredit:</strong> {{ \Carbon\Carbon::parse($kredit->tanggal_kredit)->translatedFormat('d F Y') }}</p>
        <p><strong>Jatuh Tempo:</strong> {{ \Carbon\Carbon::parse($kredit->jatuh_tempo)->translatedFormat('d F Y') }}</p>
        <p><strong>Tahun:</strong> {{ $kredit->mobil->tahun }}</p>
        <p><strong>Harga:</strong> Rp {{ number_format($kredit->mobil->harga, 0, ',', '.') }}</p>

        @if ($kredit->mobil->image)
            <img src="{{ asset('storage/' . $kredit->mobil->image) }}" alt="Mobil">
        @endif
    @else
        <p>Mobil tidak ditemukan</p>
    @endif

    {{-- Form Update Status --}}
    @if ($status === 'pending')
        <form action="{{ route('kreditmobil.updateStatus', $kredit->id) }}" method="POST">
            @csrf
            <button type="submit" name="status" value="done" class="btn btn-success">Done</button>
            <button type="submit" name="status" value="reject" class="btn btn-danger">Reject</button>
        </form>
    @else
        <div class="status-message">
            @if ($status === 'done')
                ✅ Kredit sudah disetujui.
            @elseif($status === 'reject')
                ❌ Kredit ditolak.
            @endif
        </div>
    @endif

    <br>
    {{-- Tombol Back --}}
    <a href="{{ route('kreditmobil.index') }}" class="btn btn-back">⬅ Back </a>
</body>

</html>
