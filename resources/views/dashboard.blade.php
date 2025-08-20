<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Sitoko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #ffffff;
            min-height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            background: linear-gradient(180deg, #3b82f6 0%, #2563eb 100%);
            box-shadow: 0 0 25px -5px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .nav-item {
            transition: all 0.2s ease;
            border-left: 4px solid transparent;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #1e40af;
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.15);
            border-left: 4px solid #1e40af;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }

        .stat-card {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border-radius: 12px;
            overflow: hidden;
        }

        .logout-btn {
            transition: all 0.3s ease;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            box-shadow: 0 4px 6px rgba(220, 38, 38, 0.2);
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 10px rgba(220, 38, 38, 0.3);
        }

        .brand-logo {
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .calendar {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .calendar-header {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 10px;
            text-align: center;
            font-weight: 600;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            padding: 10px;
        }

        .calendar-day {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            border-radius: 50%;
            font-size: 12px;
            cursor: pointer;
        }

        .calendar-day:hover {
            background-color: #e5e7eb;
        }

        .calendar-day.current {
            background-color: #3b82f6;
            color: white;
        }

        .calendar-day-name {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 64px;
            }

            .sidebar .menu-text {
                display: none;
            }

            .main-content {
                margin-left: 64px;
            }
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quick-action {
            transition: all 0.3s ease;
        }

        .quick-action:hover {
            transform: translateY(-3px);
        }

        .main-container {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .main-content {
            flex: 1;
            padding: 2rem;
            margin-left: 16rem;
            overflow-y: auto;
            height: 100vh;
        }

        .stats-container {
            max-height: calc(100vh - 200px);
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .chart-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 15px;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 3px;
            margin-right: 5px;
        }

        .legend-text {
            font-size: 12px;
            color: #4b5563;
        }

        .chart-value {
            font-weight: 600;
            margin-left: 5px;
        }

        .chart-actions {
            display: flex;
            gap: 10px;
        }

        .chart-btn {
            background: #f3f4f6;
            border: none;
            padding: 5px 10px;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .chart-btn:hover {
            background: #e5e7eb;
        }

        .chart-card {
            position: relative;
            overflow: hidden;
            background: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .chart-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #3b82f6, #10b981, #8b5cf6, #f59e0b);
        }

        .card.p-6:has(.quick-action) {
            background: white;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        /* Animasi Mobil - Diperlebar ke bawah */
        .road-container {
            position: relative;
            width: 100%;
            height: 180px;
            /* Diperbesar dari 120px */
            margin-top: 30px;
            overflow: hidden;
            border-radius: 8px;
            background: linear-gradient(to bottom, #87CEEB, #E0F7FA);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .road {
            position: absolute;
            bottom: 50px;
            width: 100%;
            height: 15px;
            background: #555;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.3);
        }

        .road-line {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            height: 5px;
            background: #ffeb3b;
            width: 50px;
            animation: road-line 1.5s linear infinite;
            box-shadow: 0 0 5px #ffeb3b;
        }

        .car {
            position: absolute;
            bottom: 60px;
            left: 0;
            width: 80px;
            height: 40px;
            animation: drive 7s linear infinite;
            z-index: 10;
        }

        .car-body {
            position: absolute;
            width: 80px;
            height: 25px;
            background: #ff5252;
            border-radius: 15px 15px 8px 8px;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
        }

        .car-top {
            position: absolute;
            top: -15px;
            left: 15px;
            width: 50px;
            height: 20px;
            background: #ff5252;
            border-radius: 15px 15px 0 0;
        }

        .car-window {
            position: absolute;
            top: -12px;
            left: 20px;
            width: 40px;
            height: 12px;
            background: #90caf9;
            border-radius: 10px 10px 0 0;
        }

        .car-wheel-front {
            position: absolute;
            bottom: -8px;
            left: 15px;
            width: 16px;
            height: 16px;
            background: #333;
            border-radius: 50%;
            border: 2px solid #888;
            animation: wheel-rotate 1s linear infinite;
        }

        .car-wheel-back {
            position: absolute;
            bottom: -8px;
            right: 15px;
            width: 16px;
            height: 16px;
            background: #333;
            border-radius: 50%;
            border: 2px solid #888;
            animation: wheel-rotate 1s linear infinite;
        }

        .car-light {
            position: absolute;
            bottom: 10px;
            right: -5px;
            width: 8px;
            height: 8px;
            background: #ffeb3b;
            border-radius: 50%;
            box-shadow: 0 0 10px 5px rgba(255, 235, 59, 0.7);
        }

        .cloud {
            position: absolute;
            background: white;
            border-radius: 50%;
            opacity: 0.9;
            animation: cloud 25s linear infinite;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .cloud1 {
            top: 30px;
            left: 10%;
            width: 35px;
            height: 20px;
            animation-duration: 30s;
        }

        .cloud2 {
            top: 50px;
            left: 40%;
            width: 45px;
            height: 25px;
            animation-duration: 25s;
        }

        .cloud3 {
            top: 35px;
            left: 70%;
            width: 40px;
            height: 22px;
            animation-duration: 35s;
        }

        .tree {
            position: absolute;
            bottom: 50px;
            width: 12px;
            height: 35px;
            background: #795548;
            z-index: 5;
        }

        .tree-top {
            position: absolute;
            bottom: 35px;
            left: -15px;
            width: 40px;
            height: 40px;
            background: #4caf50;
            border-radius: 50%;
            box-shadow: 0 0 10px rgba(0, 100, 0, 0.3);
        }

        .tree1 {
            left: 15%;
            animation: tree 18s linear infinite;
        }

        .tree2 {
            left: 45%;
            animation: tree 15s linear infinite;
        }

        .tree3 {
            left: 75%;
            animation: tree 20s linear infinite;
        }

        .sun {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 35px;
            height: 35px;
            background: #ffeb3b;
            border-radius: 50%;
            box-shadow: 0 0 20px #ff9800;
            animation: sun-pulse 3s ease-in-out infinite;
        }

        .mountain {
            position: absolute;
            bottom: 50px;
            width: 0;
            height: 0;
            border-left: 50px solid transparent;
            border-right: 50px solid transparent;
            border-bottom: 80px solid #78909C;
            z-index: 2;
        }

        .mountain1 {
            left: 5%;
            opacity: 0.8;
        }

        .mountain2 {
            left: 25%;
            border-bottom: 60px solid #90A4AE;
            opacity: 0.7;
        }

        .mountain3 {
            right: 15%;
            border-bottom: 70px solid #78909C;
            opacity: 0.8;
        }

        .road-sign {
            position: absolute;
            bottom: 70px;
            right: 30%;
            width: 15px;
            height: 30px;
            background: #FFD54F;
            border: 2px solid #B71C1C;
            z-index: 5;
        }

        .road-sign::after {
            content: '!';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-weight: bold;
            color: #B71C1C;
        }

        @keyframes drive {
            0% {
                left: -80px;
            }

            100% {
                left: 100%;
            }
        }

        @keyframes road-line {
            0% {
                left: -50px;
            }

            100% {
                left: 100%;
            }
        }

        @keyframes cloud {
            0% {
                left: 100%;
            }

            100% {
                left: -100px;
            }
        }

        @keyframes tree {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-150px);
            }
        }

        @keyframes wheel-rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        @keyframes sun-pulse {
            0% {
                box-shadow: 0 0 20px #ff9800;
            }

            50% {
                box-shadow: 0 0 30px 5px #ff9800;
            }

            100% {
                box-shadow: 0 0 20px #ff9800;
            }
        }
    </style>
</head>

<body class="main-container">
    <!-- Sidebar -->
    <aside class="sidebar w-64 text-white h-full fixed flex flex-col justify-between">
        <div>
            <div class="p-6 text-xl font-bold border-b border-blue-400 flex items-center">
                <svg class="w-8 h-8 mr-3 brand-logo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <span class="menu-text">Sitoko Admin</span>
            </div>
            <nav class="mt-6">
                <a href="{{ route('pengguna.index') }}" class="nav-item block px-6 py-3 flex items-center">
                    <i class="fas fa-users w-5 text-center mr-3"></i>
                    <span class="menu-text">Pengguna</span>
                </a>
                <a href="{{ route('pendataanmobil.index') }}" class="nav-item block px-6 py-3 flex items-center">
                    <i class="fas fa-car w-5 text-center mr-3"></i>
                    <span class="menu-text">Pendataan Mobil</span>
                </a>
                <a href="{{ route('kreditmobil.index') }}" class="nav-item block px-6 py-3 flex items-center">
                    <i class="fas fa-file-invoice-dollar w-5 text-center mr-3"></i>
                    <span class="menu-text">Penerimaan Mobil</span>
                </a>
                <a href="#" class="nav-item block px-6 py-3 flex items-center">
                    <i class="fas fa-credit-card w-5 text-center mr-3"></i>
                    <span class="menu-text">Pendataan Kredit</span>
                </a>
                <a href="{{ route('merek.index') }}" class="nav-item block px-6 py-3 flex items-center">
                    <i class="fas fa-tags w-5 text-center mr-3"></i>
                    <span class="menu-text">Pendataan Merek</span>
                </a>
                <a href="{{ route('laporanmobil.index') }}" class="nav-item block px-6 py-3 flex items-center">
                    <i class="fas fa-file-alt w-5 text-center mr-3"></i>
                    <span class="menu-text">Laporan Mobil</span>
                </a>
                <a href="#" class="nav-item block px-6 py-3 flex items-center relative">
                    <i class="fas fa-chart-bar w-5 text-center mr-3"></i>
                    <span class="menu-text">Laporan Kredit</span>
                </a>
            </nav>
        </div>

        <div class="p-6 border-t border-blue-400">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="logout-btn w-full py-3 rounded-lg font-semibold flex items-center justify-center">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span class="menu-text">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Selamat Datang, {{ auth()->user()->name }}</h1>
                <p class="text-gray-600">Ini adalah halaman dashboard admin Sitoko.</p>
            </div>
            <div class="flex items-center">
                <div
                    class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold mr-3">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-800">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="stat-card p-6 flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-80">Total Pengguna</p>
                    <p class="text-2xl font-bold">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>

            <div class="stat-card p-6 flex items-center justify-between"
                style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                <div>
                    <p class="text-sm opacity-80">Total Mobil</p>
                    <p class="text-2xl font-bold">{{ $totalMobils }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-car text-xl"></i>
                </div>
            </div>

            <div class="stat-card p-6 flex items-center justify-between"
                style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                <div>
                    <p class="text-sm opacity-80">Total Kredit Mobil</p>
                    <p class="text-2xl font-bold">{{ $totalKredits }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-file-invoice-dollar text-xl"></i>
                </div>
            </div>

            <div class="stat-card p-6 flex items-center justify-between"
                style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                <div>
                    <p class="text-sm opacity-80">Total Merek</p>
                    <p class="text-2xl font-bold">{{ $totalMerks }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-tags text-xl"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 stats-container">
            <div class="col-span-2 card p-6 chart-card">
                <div class="chart-header">
                    <h2 class="text-xl font-bold text-gray-800">Distribusi Data Sistem</h2>
                    <div class="chart-actions">
                        <button class="chart-btn" id="toggle-doughnut">Ubah Tampilan</button>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="distributionChart"></canvas>
                </div>
                <div class="chart-legend" id="chart-legend">
                </div>

                <div class="road-container">
                    <div class="mountain mountain1"></div>
                    <div class="mountain mountain2"></div>
                    <div class="mountain mountain3"></div>

                    <div class="sun"></div>
                    <div class="cloud cloud1"></div>
                    <div class="cloud cloud2"></div>
                    <div class="cloud cloud3"></div>

                    <div class="tree tree1">
                        <div class="tree-top"></div>
                    </div>
                    <div class="tree tree2">
                        <div class="tree-top"></div>
                    </div>
                    <div class="tree tree3">
                        <div class="tree-top"></div>
                    </div>

                    <div class="road-sign"></div>

                    <div class="road">
                        <div class="road-line"></div>
                    </div>

                    <div class="car">
                        <div class="car-body"></div>
                        <div class="car-top"></div>
                        <div class="car-window"></div>
                        <div class="car-wheel-front"></div>
                        <div class="car-wheel-back"></div>
                        <div class="car-light"></div>
                    </div>
                </div>
            </div>
            <div class="space-y-6">
                <div class="calendar">
                    <div class="calendar-header flex justify-between items-center">
                        <button id="prev-month"><i class="fas fa-chevron-left"></i></button>
                        <h3 id="current-month-year">April 2023</h3>
                        <button id="next-month"><i class="fas fa-chevron-right"></i></button>
                    </div>
                    <div class="calendar-grid">
                        <div class="calendar-day-name">Min</div>
                        <div class="calendar-day-name">Sen</div>
                        <div class="calendar-day-name">Sel</div>
                        <div class="calendar-day-name">Rab</div>
                        <div class="calendar-day-name">Kam</div>
                        <div class="calendar-day-name">Jum</div>
                        <div class="calendar-day-name">Sab</div>
                    </div>
                </div>

                <div class="card p-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Aksi Cepat</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('pengguna.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                            <div class="bg-blue-500 p-3 rounded-full mb-2">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">Kelola Pengguna</span>
                        </a>

                        <a href="{{ route('pendataanmobil.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-4 bg-green-50 rounded-lg hover:bg-green-100 transition">
                            <div class="bg-green-500 p-3 rounded-full mb-2">
                                <i class="fas fa-car text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">Data Mobil</span>
                        </a>

                        <a href="{{ route('kreditmobil.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-4 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                            <div class="bg-purple-500 p-3 rounded-full mb-2">
                                <i class="fas fa-file-invoice-dollar text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">Penerimaan</span>
                        </a>

                        <a href="{{ route('laporanmobil.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-4 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
                            <div class="bg-orange-500 p-3 rounded-full mb-2">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-800">Laporan Mobil</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const chartData = {
            labels: ['Pengguna', 'Mobil', 'Kredit Mobil', 'Merek'],
            data: [{{ $totalUsers }}, {{ $totalMobils }}, {{ $totalKredits }}, {{ $totalMerks }}],
            colors: ['#3b82f6', '#10b981', '#8b5cf6', '#f59e0b'],
            hoverColors: ['#2563eb', '#059669', '#7c3aed', '#d97706']
        };

        let distributionChart;
        let isDoughnut = false;

        function initChart() {
            const ctx = document.getElementById('distributionChart').getContext('2d');

            distributionChart = new Chart(ctx, {
                type: isDoughnut ? 'doughnut' : 'pie',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        data: chartData.data,
                        backgroundColor: chartData.colors,
                        hoverBackgroundColor: chartData.hoverColors,
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 15
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = total > 0 ? Math.round((value / total) * 100) : 0;
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            },
                            padding: 12,
                            backgroundColor: 'rgba(0, 0, 0, 0.8)',
                            titleFont: {
                                size: 14,
                                weight: 'bold'
                            },
                            bodyFont: {
                                size: 13
                            }
                        }
                    },
                    cutout: isDoughnut ? '60%' : '0%',
                    animation: {
                        animateScale: true,
                        animateRotate: true,
                        duration: 1000,
                        easing: 'easeOutQuart'
                    }
                }
            });

            updateChartLegend();
        }

        function updateChartLegend() {
            const legendContainer = document.getElementById('chart-legend');
            legendContainer.innerHTML = '';

            const total = chartData.data.reduce((a, b) => a + b, 0);

            chartData.labels.forEach((label, index) => {
                const value = chartData.data[index];
                const percentage = total > 0 ? Math.round((value / total) * 100) : 0;

                const legendItem = document.createElement('div');
                legendItem.className = 'legend-item';

                legendItem.innerHTML = `
                    <div class="legend-color" style="background-color: ${chartData.colors[index]}"></div>
                    <span class="legend-text">${label}</span>
                    <span class="chart-value">${value} (${percentage}%)</span>
                `;

                legendContainer.appendChild(legendItem);
            });
        }

        document.getElementById('toggle-doughnut').addEventListener('click', function() {
            isDoughnut = !isDoughnut;
            document.getElementById('toggle-doughnut').textContent =
                isDoughnut ? 'Tampilkan Pie Chart' : 'Tampilkan Doughnut Chart';

            if (distributionChart) {
                distributionChart.destroy();
            }
            initChart();
        });

        document.addEventListener('DOMContentLoaded', function() {
            initChart();

            const monthYearElement = document.getElementById('current-month-year');
            const calendarGrid = document.querySelector('.calendar-grid');
            const prevMonthButton = document.getElementById('prev-month');
            const nextMonthButton = document.getElementById('next-month');

            let currentDate = new Date();

            function updateCalendar() {
                while (calendarGrid.children.length > 7) {
                    calendarGrid.removeChild(calendarGrid.lastChild);
                }

                const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                ];
                monthYearElement.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;

                const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();
                const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();

                let startDay = firstDay;

                for (let i = 0; i < startDay; i++) {
                    const emptyDay = document.createElement('div');
                    emptyDay.classList.add('calendar-day');
                    calendarGrid.appendChild(emptyDay);
                }
                const today = new Date();
                for (let i = 1; i <= daysInMonth; i++) {
                    const dayElement = document.createElement('div');
                    dayElement.classList.add('calendar-day');
                    dayElement.textContent = i;
                    if (currentDate.getMonth() === today.getMonth() &&
                        currentDate.getFullYear() === today.getFullYear() &&
                        i === today.getDate()) {
                        dayElement.classList.add('current');
                    }

                    calendarGrid.appendChild(dayElement);
                }
            }

            updateCalendar();

            prevMonthButton.addEventListener('click', function() {
                currentDate.setMonth(currentDate.getMonth() - 1);
                updateCalendar();
            });

            nextMonthButton.addEventListener('click', function() {
                currentDate.setMonth(currentDate.getMonth() + 1);
                updateCalendar();
            });
        });
    </script>
</body>

</html>
