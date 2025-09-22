<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kredit Mobil | Sitoko</title>
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

        .approve-btn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.2);
            border: none;
            cursor: pointer;
        }

        .approve-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
            background: linear-gradient(135deg, #059669 0%, #047857 100%);
        }

        .reject-btn {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.2);
            border: none;
            cursor: pointer;
        }

        .reject-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
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

        .data-section {
            margin-bottom: 2.5rem;
        }

        .data-section h3 {
            font-size: 1.5rem;
            font-weight: 600;
            color: #111827;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            border-left: 4px solid #3b82f6;
            padding-left: 1rem;
        }

        .data-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .data-item {
            background: #f8fafc;
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .data-item:hover {
            background: #eff6ff;
            transform: translateY(-2px);
        }

        .data-label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.25rem;
        }

        .data-value {
            font-size: 1rem;
            color: #1f2937;
            font-weight: 500;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            gap: 0.25rem;
        }

        .status-pending {
            background: #fef3c7;
            color: #92400e;
            border: 1px solid #fcd34d;
        }

        .status-done {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-reject {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .document-image {
            max-width: 100%;
            width: 350px;
            border-radius: 10px;
            border: 2px solid #e5e7eb;
            margin: 0.75rem 0;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .document-image:hover {
            transform: scale(1.03);
            border-color: #3b82f6;
        }

        .no-image {
            width: 350px;
            height: 200px;
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #e5e7eb;
            color: #9ca3af;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 1.5rem;
        }

        .status-message {
            background: #fef3c7;
            color: #92400e;
            padding: 1rem;
            border-radius: 8px;
            margin: 1.5rem 0;
            border: 1px solid #fcd34d;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-message.approved {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .status-message.rejected {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .modal.active {
            display: flex;
            opacity: 1;
        }

        .modal-content {
            max-width: 90%;
            max-height: 90%;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
            transform: scale(0.7);
            transition: transform 0.3s ease;
        }

        .modal.active .modal-content {
            transform: scale(1);
        }

        .modal-image {
            max-width: 100%;
            max-height: 80vh;
            display: block;
        }

        .close-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .close-btn:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            transform: scale(1.1);
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
            .data-grid {
                grid-template-columns: 1fr;
            }

            .document-image, .no-image {
                width: 100%;
                max-width: 300px;
            }

            .page-title h1 {
                font-size: 1.75rem;
            }

            .page-subtitle {
                font-size: 0.875rem;
            }

            .card {
                padding: 1.5rem;
            }

            .modal-image {
                max-height: 70vh;
            }
        }
    </style>
</head>
<body class="main-container">
    <div class="page-header">
        <div class="page-title flex items-center">
            <div class="header-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div>
                <h1>Detail Kredit Mobil</h1>
                <p class="page-subtitle">Informasi pengajuan kredit untuk <strong>{{ $kredit->nama }}</strong></p>
            </div>
        </div>
        <a href="{{ route('kreditmobil.index') }}" class="back-btn">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </a>
    </div>
    <div class="card fade-in">
        <div class="data-section">
            <h3><i class="fas fa-user text-blue-500"></i> Data Pemohon</h3>
            <div class="data-grid">
                <div class="data-item">
                    <div class="data-label">Nama</div>
                    <div class="data-value">{{ $kredit->nama }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Tanggal Kredit</div>
                    <div class="data-value">{{ \Carbon\Carbon::parse($kredit->tanggal_kredit)->translatedFormat('d F Y') }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Bunga</div>
                    <div class="data-value">{{ $kredit->bunga }}%</div>
                </div>
                <div class="data-item">
                    <div class="data-label">DP</div>
                    <div class="data-value">Rp {{ number_format($kredit->dp, 0, ',', '.') }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Metode Pembayaran</div>
                    <div class="data-value">{{ $kredit->metode_pembayaran }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Status</div>
                    @php
                        $status = $kredit->status ?? 'pending';
                    @endphp
                    <div class="data-value">
                        <span class="status-badge status-{{ $status }}">
                            <i class="fas fa-circle" style="font-size: 0.5rem;"></i>
                            {{ ucfirst($status) }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="data-section">
            <h3><i class="fas fa-car text-blue-500"></i> Data Mobil</h3>
            @if ($kredit->mobil)
                <div class="data-grid">
                    <div class="data-item">
                        <div class="data-label">Nama Mobil</div>
                        <div class="data-value">{{ $kredit->mobil->name }}</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Merk</div>
                        <div class="data-value">{{ $kredit->mobil->merk->name ?? '-' }}</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Tipe</div>
                        <div class="data-value">{{ $kredit->mobil->tipe->name ?? '-' }}</div>
                    </div>
                    <div class="data-item">
                        <div class="data-label">Tanggal Kredit</div>
                    <div class="data-value">{{ \Carbon\Carbon::parse($kredit->tanggal_kredit)->translatedFormat('d F Y') }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Jatuh Tempo</div>
                    <div class="data-value">{{ \Carbon\Carbon::parse($kredit->jatuh_tempo)->translatedFormat('d F Y') }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Tahun</div>
                    <div class="data-value">{{ $kredit->mobil->tahun }}</div>
                </div>
                <div class="data-item">
                    <div class="data-label">Harga</div>
                    <div class="data-value">Rp {{ number_format($kredit->mobil->harga, 0, ',', '.') }}</div>
                </div>
            </div>
        @else
            <div class="data-grid">
                <div class="data-item">
                    <div class="data-label">Informasi Mobil</div>
                    <div class="data-value">Mobil tidak ditemukan</div>
                </div>
            </div>
        @endif
    </div>

    <div class="data-section">
        <h3><i class="fas fa-file-image text-blue-500"></i> Foto Dokumen</h3>
        <div class="data-grid">
            <div class="data-item">
                <div class="data-label">KTP</div>
                @if ($kredit->foto_ktp)
                    <img src="{{ asset('storage/' . $kredit->foto_ktp) }}" alt="Foto KTP" class="document-image" data-modal-target="modal-ktp">
                @else
                    <div class="no-image">Tidak Ada Foto KTP</div>
                @endif
            </div>
            <div class="data-item">
                <div class="data-label">KK</div>
                @if ($kredit->foto_kk)
                    <img src="{{ asset('storage/' . $kredit->foto_kk) }}" alt="Foto KK" class="document-image" data-modal-target="modal-kk">
                @else
                    <div class="no-image">Tidak Ada Foto KK</div>
                @endif
            </div>
            <div class="data-item">
                <div class="data-label">Gambar Mobil</div>
                @if ($kredit->mobil && $kredit->mobil->image)
                    <img src="{{ asset('storage/' . $kredit->mobil->image) }}" alt="Mobil" class="document-image" data-modal-target="modal-mobil">
                @else
                    <div class="no-image">Tidak Ada Gambar Mobil</div>
                @endif
            </div>
        </div>
    </div>

    @if ($status === 'pending')
        <div class="action-buttons">
            <form action="{{ route('kreditmobil.updateStatus', $kredit->id) }}" method="POST">
                @csrf
                <button type="submit" name="status" value="done" class="approve-btn">
                    <i class="fas fa-check"></i>
                    Setujui
                </button>
            </form>
            <form action="{{ route('kreditmobil.updateStatus', $kredit->id) }}" method="POST">
                @csrf
                <button type="submit" name="status" value="reject" class="reject-btn">
                    <i class="fas fa-times"></i>
                    Tolak
                </button>
            </form>
        </div>
    @else
        <div class="status-message {{ $status === 'done' ? 'approved' : 'rejected' }}">
            <i class="fas {{ $status === 'done' ? 'fa-check-circle' : 'fa-times-circle' }}"></i>
            {{ $status === 'done' ? 'Kredit sudah disetujui.' : 'Kredit ditolak.' }}
        </div>
    @endif
</div>

<div id="modal-ktp" class="modal">
    <div class="modal-content">
        <span class="close-btn"><i class="fas fa-times"></i></span>
        @if ($kredit->foto_ktp)
            <img src="{{ asset('storage/' . $kredit->foto_ktp) }}" alt="Foto KTP" class="modal-image">
        @endif
    </div>
</div>

<div id="modal-kk" class="modal">
    <div class="modal-content">
        <span class="close-btn"><i class="fas fa-times"></i></span>
        @if ($kredit->foto_kk)
            <img src="{{ asset('storage/' . $kredit->foto_kk) }}" alt="Foto KK" class="modal-image">
        @endif
    </div>
</div>

<div id="modal-mobil" class="modal">
    <div class="modal-content">
        <span class="close-btn"><i class="fas fa-times"></i></span>
        @if ($kredit->mobil && $kredit->mobil->image)
            <img src="{{ asset('storage/' . $kredit->mobil->image) }}" alt="Mobil" class="modal-image">
        @endif
    </div>
</div>

<script>
    document.querySelectorAll('.document-image').forEach(img => {
        img.addEventListener('click', function() {
            const modalId = this.getAttribute('data-modal-target');
            const modal = document.getElementById(modalId);
            modal.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    document.querySelectorAll('.close-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const modal = this.closest('.modal');
            modal.classList.remove('active');
            document.body.style.overflow = 'auto';
        });
    });

    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === modal) {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    });

    document.querySelectorAll('form[action*="{{ route('kreditmobil.updateStatus', $kredit->id) }}"] button').forEach(button => {
        button.addEventListener('click', function(e) {
            const status = this.value;
            const message = status === 'done'
                ? 'Apakah Anda yakin ingin menyetujui pengajuan kredit ini?'
                : 'Apakah Anda yakin ingin menolak pengajuan kredit ini?';
            if (!confirm(message)) {
                e.preventDefault();
            }
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

    document.querySelectorAll('.data-item').forEach(item => {
        observer.observe(item);
    });
</script>
</body>
</html>
