<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kredit Mobil | Sitoko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            min-height: 100vh;
        }

        .main-container {
            background: #f9fafb;
            min-height: 100vh;
            padding: 2rem;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .back-btn {
            background: linear-gradient(135deg, #6b7280 0%, #4b5563 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 8px rgba(107, 114, 128, 0.2);
            text-decoration: none;
        }

        .back-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(107, 114, 128, 0.3);
            background: linear-gradient(135deg, #4b5563 0%, #374151 100%);
        }

        .detail-btn {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            text-decoration: none;
        }

        .detail-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.3);
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 2rem;
            gap: 2rem;
        }

        .page-title {
            flex: 1;
        }

        .page-title h1 {
            font-size: 2rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 0.875rem;
        }

        .table-container {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .table-header {
            background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
            border-bottom: 2px solid #e5e7eb;
        }

        .table-header th {
            padding: 1rem 1.5rem;
            font-weight: 600;
            color: #374151;
            text-align: left;
            font-size: 0.875rem;
            text-transform: uppercase;
            letter-spacing: 0.025em;
        }

        .table-row {
            border-bottom: 1px solid #f3f4f6;
            transition: all 0.3s ease;
        }

        .table-row:hover {
            background-color: #f9fafb;
            transform: translateX(2px);
        }

        .table-cell {
            padding: 1rem 1.5rem;
            color: #4b5563;
            font-size: 0.875rem;
            vertical-align: middle;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            gap: 0.25rem;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .status-approved {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-rejected {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .success-message {
            background: #dcfce7;
            color: #166534;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid #bbf7d0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
        }

        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.5;
        }

        .empty-state h3 {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #374151;
        }

        .empty-state p {
            margin-bottom: 2rem;
        }

        .stats-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
        }

        .stat-title {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #111827;
        }

        .stat-icon {
            float: right;
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
        }

        .price-display {
            font-weight: 600;
            color: #059669;
            font-size: 1rem;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</head>
<body class="main-container">
    <div class="page-header">
        <div class="page-title">
            <h1>Data Kredit Mobil</h1>
            <p class="page-subtitle">Kelola data pengajuan kredit mobil dalam sistem</p>
        </div>
        <div class="flex gap-3">
            <a href="{{ route('dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>
        </div>
    </div>

    <div class="stats-container">
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-title">Total Pengajuan</div>
            <div class="stat-value">{{ $kredits->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                <i class="fas fa-check-circle"></i>
            </div>
            <div class="stat-title">Disetujui</div>
            <div class="stat-value">{{ $kredits->where('status', 'approved')->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #fef3c7 0%, #fcd34d 100%);">
                <i class="fas fa-hourglass-half"></i>
            </div>
            <div class="stat-title">Pending</div>
            <div class="stat-value">{{ $kredits->where('status', 'pending')->count() }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-icon" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);">
                <i class="fas fa-times-circle"></i>
            </div>
            <div class="stat-title">Ditolak</div>
            <div class="stat-value">{{ $kredits->where('status', 'rejected')->count() }}</div>
        </div>
    </div>

    <div class="card fade-in">
        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        @if($kredits->count() > 0)
            <div class="table-container">
                <table class="w-full">
                    <thead class="table-header">
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
                            <tr class="table-row">
                                <td class="table-cell">{{ $kredit->id }}</td>
                                <td class="table-cell">{{ $kredit->nama }}</td>
                                <td class="table-cell">{{ $kredit->mobil->name ?? '-' }}</td>
                                <td class="table-cell">
                                    <span class="price-display">Rp {{ number_format($kredit->dp, 0, ',', '.') }}</span>
                                </td>
                                <td class="table-cell">
                                    @if($kredit->status === 'pending')
                                        <span class="status-badge status-pending">
                                            <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                            Pending
                                        </span>
                                    @elseif($kredit->status === 'approved')
                                        <span class="status-badge status-approved">
                                            <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                            Disetujui
                                        </span>
                                    @elseif($kredit->status === 'rejected')
                                        <span class="status-badge status-rejected">
                                            <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                            Ditolak
                                        </span>
                                    @else
                                        <span class="status-badge status-pending">
                                            <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                            Pending
                                        </span>
                                    @endif
                                </td>
                                <td class="table-cell">
                                    <div class="action-buttons">
                                        <a href="{{ route('kreditmobil.show', $kredit->id) }}" class="detail-btn">
                                            <i class="fas fa-eye"></i>
                                            Detail
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-file-alt"></i>
                <h3>Belum Ada Data Kredit</h3>
                <p>Tidak ada pengajuan kredit mobil yang tersedia saat ini</p>
            </div>
        @endif
    </div>

    <script>
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeIn 0.6s ease-out';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.stat-card').forEach(card => {
            observer.observe(card);
        });
    </script>
</body>
</html>
