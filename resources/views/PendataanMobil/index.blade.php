<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendataan Mobil | Sitoko</title>
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

        .add-btn {
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

        .add-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .edit-btn {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
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

        .edit-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(245, 158, 11, 0.3);
            background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
        }

        .delete-btn {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            font-weight: 500;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            border: none;
            cursor: pointer;
        }

        .delete-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(239, 68, 68, 0.3);
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        }

        .disabled-btn {
            background: linear-gradient(135deg, #9ca3af 0%, #6b7280 100%);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.875rem;
            display: inline-flex;
            align-items: center;
            gap: 0.375rem;
            opacity: 0.7;
            cursor: not-allowed;
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

        .car-image {
            width: 64px;
            height: 48px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid #e5e7eb;
            transition: transform 0.3s ease;
        }

        .car-image:hover {
            transform: scale(1.1);
            border-color: #3b82f6;
        }

        .no-image {
            width: 64px;
            height: 48px;
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e5e7eb;
        }

        .no-image i {
            color: #9ca3af;
            font-size: 1.5rem;
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

        .status-available {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-unavailable {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
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

        .car-info {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .car-details h4 {
            font-weight: 600;
            color: #111827;
            margin-bottom: 0.25rem;
        }

        .car-details p {
            font-size: 0.75rem;
            color: #6b7280;
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

        /* Skeleton Loading Styles */
        .skeleton {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: skeleton-loading 1.5s ease-in-out infinite;
            border-radius: 8px;
        }

        @keyframes skeleton-loading {
            0% {
                background-position: 200% 0;
            }
            100% {
                background-position: -200% 0;
            }
        }

        .skeleton-header {
            height: 40px;
            width: 60%;
            margin-bottom: 1rem;
        }

        .skeleton-button {
            height: 40px;
            width: 150px;
            border-radius: 8px;
        }

        .skeleton-stat-card {
            height: 100px;
            width: 100%;
            border-radius: 12px;
        }

        .skeleton-table-header {
            height: 48px;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .skeleton-table-row {
            height: 64px;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body class="main-container">
    <!-- Skeleton Loader -->
    <div id="skeleton-loader">
        <div class="page-header">
            <div class="page-title">
                <div class="skeleton skeleton-header"></div>
                <div class="skeleton" style="height: 20px; width: 40%;"></div>
            </div>
            <div class="flex gap-3">
                <div class="skeleton skeleton-button"></div>
                <div class="skeleton skeleton-button"></div>
            </div>
        </div>

        <div class="stats-container">
            <div class="skeleton skeleton-stat-card"></div>
            <div class="skeleton skeleton-stat-card"></div>
            <div class="skeleton skeleton-stat-card"></div>
        </div>

        <div class="card">
            <div class="table-container">
                <div class="skeleton skeleton-table-header"></div>
                <div class="skeleton skeleton-table-row"></div>
                <div class="skeleton skeleton-table-row"></div>
                <div class="skeleton skeleton-table-row"></div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content" class="hidden">
        <div class="page-header">
            <div class="page-title">
                <h1>Pendataan Mobil</h1>
                <p class="page-subtitle">Kelola data mobil, status ketersediaan, dan informasi lengkap kendaraan</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ url('/dashboard') }}" class="back-btn">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Dashboard
                </a>
                <a href="{{ route('pendataanmobil.create') }}" class="add-btn">
                    <i class="fas fa-plus"></i>
                    Tambah Mobil
                </a>
            </div>
        </div>

        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);">
                    <i class="fas fa-car"></i>
                </div>
                <div class="stat-title">Total Mobil</div>
                <div class="stat-value">{{ $mobils->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="stat-title">Tersedia</div>
                <div class="stat-value">{{ $mobils->where('status', 'available')->count() }}</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon" style="background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);">
                    <i class="fas fa-times-circle"></i>
                </div>
                <div class="stat-title">Tidak Tersedia</div>
                <div class="stat-value">{{ $mobils->where('status', 'unavailable')->count() }}</div>
            </div>
        </div>

        <div class="card fade-in">
            @if($mobils->count() > 0)
                <div class="table-container">
                    <table class="w-full">
                        <thead class="table-header">
                            <tr>
                                <th>Mobil</th>
                                <th>Merek & Tipe</th>
                                <th>Harga</th>
                                <th>Status</th>
                                <th>Tahun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mobils as $mobil)
                                <tr class="table-row">
                                    <td class="table-cell">
                                        <div class="car-info">
                                            @if ($mobil->image)
                                                <img src="{{ asset('storage/' . $mobil->image) }}"
                                                     alt="{{ $mobil->name }}"
                                                     class="car-image">
                                            @else
                                                <div class="no-image">
                                                    <i class="fas fa-car"></i>
                                                </div>
                                            @endif
                                            <div class="car-details">
                                                <h4>{{ $mobil->name }}</h4>
                                                <p>ID: {{ $mobil->id }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="table-cell">
                                        <div>
                                            <div class="font-semibold text-gray-900">{{ $mobil->merk->name ?? 'Tidak ada merek' }}</div>
                                            <div class="text-sm text-gray-500">{{ $mobil->tipe->name ?? 'Tidak ada tipe' }}</div>
                                        </div>
                                    </td>
                                    <td class="table-cell">
                                        <span class="price-display">Rp {{ number_format($mobil->harga, 0, ',', '.') }}</span>
                                    </td>
                                    <td class="table-cell">
                                        @if ($mobil->status === 'available')
                                            <span class="status-badge status-available">
                                                <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                                Tersedia
                                            </span>
                                        @else
                                            <span class="status-badge status-unavailable">
                                                <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                                                Tidak Tersedia
                                            </span>
                                        @endif
                                    </td>
                                    <td class="table-cell">
                                        <span class="font-medium">{{ $mobil->tahun }}</span>
                                    </td>
                                    <td class="table-cell">
                                        <div class="action-buttons">
                                            @if ($mobil->status === 'available')
                                                <a href="{{ route('pendataanmobil.edit', $mobil->id) }}" class="edit-btn">
                                                    <i class="fas fa-edit"></i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('pendataanmobil.destroy', $mobil->id) }}" method="POST"
                                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus mobil {{ $mobil->name }}? Tindakan ini tidak dapat dibatalkan.')" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="delete-btn">
                                                        <i class="fas fa-trash"></i>
                                                        Hapus
                                                    </button>
                                                </form>
                                            @else
                                                <span class="disabled-btn">
                                                    <i class="fas fa-lock"></i>
                                                    Tidak Tersedia
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="empty-state">
                    <i class="fas fa-car"></i>
                    <h3>Belum Ada Data Mobil</h3>
                    <p>Mulai tambahkan data mobil untuk mengelola inventori kendaraan Anda</p>
                    <a href="{{ route('pendataanmobil.create') }}" class="add-btn">
                        <i class="fas fa-plus"></i>
                        Tambah Mobil Pertama
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Skeleton Loader Logic
        window.addEventListener('load', function() {
            const skeletonLoader = document.getElementById('skeleton-loader');
            const mainContent = document.getElementById('main-content');
            setTimeout(() => {
                skeletonLoader.classList.add('hidden');
                mainContent.classList.remove('hidden');
            }, 1000); // Simulate loading delay
        });

        document.querySelectorAll('form[method="POST"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const carName = this.closest('tr').querySelector('.car-details h4').textContent;

                if (confirm(`Apakah Anda yakin ingin menghapus mobil "${carName}"?\n\nTindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait mobil tersebut.`)) {
                    this.submit();
                }
            });
        });

        document.querySelectorAll('.car-image').forEach(img => {
            img.addEventListener('click', function() {
                console.log('Image clicked:', this.src);
            });
        });

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
