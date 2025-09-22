<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pengguna | Sitoko</title>
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
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid #e5e7eb;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .tab-button {
            transition: all 0.3s ease;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .tab-button.active {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        }

        .tab-button:not(.active) {
            background: #f3f4f6;
            color: #6b7280;
        }

        .tab-button:not(.active):hover {
            background: #e5e7eb;
            color: #374151;
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
            transition: background-color 0.2s ease;
        }

        .table-row:hover {
            background-color: #f9fafb;
        }

        .table-cell {
            padding: 1rem 1.5rem;
            color: #4b5563;
            font-size: 0.875rem;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.375rem 0.75rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: capitalize;
        }

        .role-badge.user {
            background: #dbeafe;
            color: #1e40af;
        }

        .role-badge.admin {
            background: #f3e8ff;
            color: #7c3aed;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            align-items: center;
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

        .tab-container {
            margin-bottom: 2rem;
        }

        .tab-buttons {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }

        .content-section {
            display: none;
        }

        .content-section.active {
            display: block;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding: 0 0.5rem;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #111827;
        }

        .empty-state {
            text-align: center;
            padding: 3rem;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.5;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-out;
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

        .skeleton-tab {
            height: 40px;
            width: 120px;
            border-radius: 8px;
        }

        .skeleton-table-header {
            height: 48px;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .skeleton-table-row {
            height: 56px;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .skeleton-button {
            height: 40px;
            width: 150px;
            border-radius: 8px;
        }

        .hidden {
            display: none;
        }
    </style>
</head>
<body class="main-container">
    <div id="skeleton-loader">
        <div class="page-header">
            <div class="page-title">
                <div class="skeleton skeleton-header"></div>
                <div class="skeleton" style="height: 20px; width: 40%;"></div>
            </div>
            <div class="skeleton skeleton-button"></div>
        </div>

        <div class="tab-container">
            <div class="tab-buttons">
                <div class="skeleton skeleton-tab"></div>
                <div class="skeleton skeleton-tab"></div>
            </div>

            <div class="card">
                <div class="section-header p-6 border-b border-gray-100">
                    <div>
                        <div class="skeleton" style="height: 24px; width: 200px;"></div>
                        <div class="skeleton" style="height: 16px; width: 300px; margin-top: 4px;"></div>
                    </div>
                    <div class="skeleton skeleton-button"></div>
                </div>
                <div class="table-container">
                    <div class="skeleton skeleton-table-header"></div>
                    <div class="skeleton skeleton-table-row"></div>
                    <div class="skeleton skeleton-table-row"></div>
                    <div class="skeleton skeleton-table-row"></div>
                </div>
            </div>
        </div>
    </div>
    <div id="main-content" class="hidden">
        <div class="page-header">
            <div class="page-title">
                <h1>Manajemen Pengguna</h1>
                <p class="page-subtitle">Kelola pengguna dan administrator sistem dengan mudah</p>
            </div>
            <a href="{{ route('dashboard') }}" class="back-btn">
                <i class="fas fa-arrow-left"></i>
                Kembali ke Dashboard
            </a>
        </div>

        <div class="tab-container">
            <div class="tab-buttons">
                <button id="tabUser" class="tab-button active">
                    <i class="fas fa-users mr-2"></i>
                    Pengguna
                </button>
                <button id="tabAdmin" class="tab-button">
                    <i class="fas fa-user-shield mr-2"></i>
                    Administrator
                </button>
            </div>

            <div id="contentUser" class="content-section active card fade-in">
                <div class="section-header p-6 border-b border-gray-100">
                    <div>
                        <h2 class="section-title">Daftar Pengguna</h2>
                        <p class="text-sm text-gray-500 mt-1">Kelola semua pengguna yang terdaftar dalam sistem</p>
                    </div>
                    <a href="{{ route('pengguna.create') }}" class="add-btn">
                        <i class="fas fa-plus"></i>
                        Tambah Pengguna
                    </a>
                </div>

                <div class="table-container">
                    <table class="w-full">
                        <thead class="table-header">
                            <tr>
                                <th>Nama Pengguna</th>
                                <th>Alamat Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr class="table-row">
                                <td class="table-cell">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-blue-600 font-medium text-sm">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                        </div>
                                        <span class="font-medium text-gray-900">{{ $user->name }}</span>
                                    </div>
                                </td>
                                <td class="table-cell">{{ $user->email }}</td>
                                <td class="table-cell">
                                    <span class="role-badge {{ $user->role }}">
                                        <i class="fas fa-circle mr-1" style="font-size: 0.5rem;"></i>
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="table-cell">
                                    <div class="action-buttons">
                                        <a href="{{ route('pengguna.edit', $user->id) }}" class="edit-btn">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('pengguna.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div id="contentAdmin" class="content-section card">
                <div class="section-header p-6 border-b border-gray-100">
                    <div>
                        <h2 class="section-title">Daftar Administrator</h2>
                        <p class="text-sm text-gray-500 mt-1">Kelola administrator yang memiliki akses penuh ke sistem</p>
                    </div>
                    <a href="{{ route('pengguna.create') }}" class="add-btn">
                        <i class="fas fa-plus"></i>
                        Tambah Administrator
                    </a>
                </div>

                <div class="table-container">
                    <table class="w-full">
                        <thead class="table-header">
                            <tr>
                                <th>Nama Administrator</th>
                                <th>Alamat Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr class="table-row">
                                <td class="table-cell">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                            <span class="text-purple-600 font-medium text-sm">{{ strtoupper(substr($admin->name, 0, 1)) }}</span>
                                        </div>
                                        <span class="font-medium text-gray-900">{{ $admin->name }}</span>
                                    </div>
                                </td>
                                <td class="table-cell">{{ $admin->email }}</td>
                                <td class="table-cell">
                                    <span class="role-badge {{ $admin->role }}">
                                        <i class="fas fa-circle mr-1" style="font-size: 0.5rem;"></i>
                                        {{ ucfirst($admin->role) }}
                                    </span>
                                </td>
                                <td class="table-cell">
                                    <div class="action-buttons">
                                        <a href="{{ route('pengguna.edit', $admin->id) }}" class="edit-btn">
                                            <i class="fas fa-edit"></i>
                                            Edit
                                        </a>
                                        <form action="{{ route('pengguna.destroy', $admin->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus administrator ini?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">
                                                <i class="fas fa-trash"></i>
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('load', function() {
            const skeletonLoader = document.getElementById('skeleton-loader');
            const mainContent = document.getElementById('main-content');
            setTimeout(() => {
                skeletonLoader.classList.add('hidden');
                mainContent.classList.remove('hidden');
            }, 1000);
        });

        const tabUser = document.getElementById('tabUser');
        const tabAdmin = document.getElementById('tabAdmin');
        const contentUser = document.getElementById('contentUser');
        const contentAdmin = document.getElementById('contentAdmin');

        function switchTab(activeTab, inactiveTab, activeContent, inactiveContent) {
            activeTab.classList.add('active');
            inactiveTab.classList.remove('active');

            inactiveContent.classList.remove('active');
            setTimeout(() => {
                activeContent.classList.add('active');
                activeContent.classList.add('fade-in');
                setTimeout(() => {
                    activeContent.classList.remove('fade-in');
                }, 500);
            }, 150);
        }

        tabUser.addEventListener('click', () => {
            switchTab(tabUser, tabAdmin, contentUser, contentAdmin);
        });

        tabAdmin.addEventListener('click', () => {
            switchTab(tabAdmin, tabUser, contentAdmin, contentUser);
        });

        document.querySelectorAll('form[method="POST"]').forEach(form => {
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                const isAdmin = this.querySelector('button').textContent.includes('administrator');
                const userType = isAdmin ? 'administrator' : 'pengguna';

                if (confirm(`Apakah Anda yakin ingin menghapus ${userType} ini? Tindakan ini tidak dapat dibatalkan.`)) {
                    this.submit();
                }
            });
        });

        document.querySelectorAll('.table-row').forEach(row => {
            row.addEventListener('mouseenter', function() {
                this.style.transform = 'translateX(2px)';
            });

            row.addEventListener('mouseleave', function() {
                this.style.transform = 'translateX(0)';
            });
        });
    </script>
</body>
</html>
