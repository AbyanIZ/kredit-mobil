<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Mobil | Sitoko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
            margin: 0;
        }

        .main-container {
            padding: 3rem 2rem;
            max-width: 100%;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            padding: 2.5rem;
            margin: 0 auto;
            max-width: 1200px;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2.5rem;
            padding: 0 1rem;
        }

        .page-title h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 0.25rem;
        }

        .page-subtitle {
            color: #6b7280;
            font-size: 1.125rem;
            font-weight: 400;
        }

        .header-icon {
            width: 3rem;
            height: 3rem;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            margin-right: 1rem;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
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

        .export-btn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 500;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
            text-decoration: none;
        }

        .export-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .table-container {
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        table {
            width: 100%;
            border-collapse: collapse;
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
            background-color: #eff6ff;
            transform: translateX(2px);
        }

        .table-cell {
            padding: 1rem 1.5rem;
            color: #4b5563;
            font-size: 0.875rem;
            vertical-align: middle;
        }

        .status-available {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-unavailable {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
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

        .price-display {
            font-weight: 600;
            color: #059669;
            font-size: 0.875rem;
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

        @media (max-width: 768px) {
            .page-title h1 {
                font-size: 1.75rem;
            }

            .page-subtitle {
                font-size: 0.875rem;
            }

            .card {
                padding: 1.5rem;
            }

            .table-header th, .table-cell {
                padding: 0.75rem;
                font-size: 0.75rem;
            }

            .action-buttons {
                flex-direction: column;
                gap: 0.5rem;
            }
        }
    </style>
</head>
<body class="main-container">
    <div class="page-header">
        <div class="page-title flex items-center">
            <div class="header-icon">
                <i class="fas fa-car"></i>
            </div>
            <div>
                <h1>Laporan Mobil</h1>
                <p class="page-subtitle">Daftar mobil yang tersedia dan tidak tersedia</p>
            </div>
        </div>
        <div class="action-buttons">
            <a href="{{ url()->previous() }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
            <a href="{{ route('laporan.mobil.export') }}" class="export-btn">
                <i class="fas fa-download"></i>
                Download Excel
            </a>
        </div>
    </div>

    <div class="card fade-in">
        <div class="table-container">
            @if ($mobils->count() > 0)
                <table>
                    <thead class="table-header">
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
                        @foreach ($mobils as $mobil)
                            <tr class="table-row">
                                <td class="table-cell">{{ $mobil->id }}</td>
                                <td class="table-cell">{{ $mobil->name }}</td>
                                <td class="table-cell">{{ $mobil->merk->name ?? '-' }}</td>
                                <td class="table-cell">{{ $mobil->tipe->name ?? '-' }}</td>
                                <td class="table-cell">
                                    <span class="price-display">Rp {{ number_format($mobil->harga, 0, ',', '.') }}</span>
                                </td>
                                <td class="table-cell">
                                    @if ($mobil->status === 'available')
                                        <span class="status-available">
                                            <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                            Tersedia
                                        </span>
                                    @else
                                        <span class="status-unavailable">
                                            <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                            Tidak Tersedia
                                        </span>
                                    @endif
                                </td>
                                <td class="table-cell">{{ $mobil->tahun }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="empty-state">
                    <i class="fas fa-car"></i>
                    <h3>Tidak Ada Data Mobil</h3>
                    <p>Tidak ada data mobil yang tersedia saat ini</p>
                </div>
            @endif
        </div>
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

        document.querySelectorAll('.table-row').forEach(row => {
            observer.observe(row);
        });
    </script>
</body>
</html>
