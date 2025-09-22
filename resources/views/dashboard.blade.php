<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | Sitoko</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: #f9fafb;
            min-height: 100vh;
        }

        .sidebar {
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
            box-shadow: 2px 0 20px rgba(0, 0, 0, 0.1);
            transition: width 0.3s ease;
        }

        .nav-item {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            padding: 1rem 1.5rem;
            margin: 0.25rem 0;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left-color: #3b82f6;
            transform: translateX(3px);
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.15);
            border-left-color: #3b82f6;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border-radius: 12px;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
        }

        .logout-btn {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            box-shadow: 0 2px 8px rgba(220, 38, 38, 0.2);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.3);
        }

        .brand-logo {
            filter: drop-shadow(0 1px 3px rgba(0, 0, 0, 0.1));
        }

        .calendar {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .calendar-header {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 1rem;
            font-weight: 600;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            padding: 1rem;
        }

        .calendar-day {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 32px;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
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
            height: 32px;
            font-size: 12px;
            font-weight: 500;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 72px;
            }

            .sidebar .menu-text {
                display: none;
            }

            .main-content {
                margin-left: 72px;
            }
        }

        .notification-badge {
            position: absolute;
            top: -4px;
            right: -4px;
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
            border-radius: 8px;
            padding: 1rem;
        }

        .quick-action:hover {
            transform: translateY(-2px);
            background: #f1f5f9;
        }

        .main-container {
            display: flex;
            height: 100vh;
        }

        .main-content {
            flex: 1;
            padding: 2rem;
            margin-left: 16rem;
            overflow-y: auto;
            background: #f9fafb;
        }

        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }

        .line-chart-container {
            position: relative;
            height: 180px;
            width: 100%;
            margin-top: 1.5rem;
            border-radius: 8px;
            background: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            padding: 1rem;
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
            gap: 8px;
            margin-top: 1rem;
        }

        .legend-item {
            display: flex;
            align-items: center;
        }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 3px;
            margin-right: 6px;
        }

        .legend-text {
            font-size: 12px;
            color: #4b5563;
        }

        .chart-value {
            font-weight: 500;
            margin-left: 6px;
        }

        .chart-actions {
            display: flex;
            gap: 8px;
        }

        .chart-btn {
            background: #f3f4f6;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-size: 12px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .chart-btn:hover {
            background: #e5e7eb;
        }

        .chart-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #3b82f6, #10b981, #8b5cf6, #f59e0b);
        }
    </style>
</head>

<body class="main-container">
    <aside class="sidebar w-64 text-white h-full fixed flex flex-col justify-between">
        <div>
            <div class="p-5 text-xl font-semibold border-b border-blue-500 flex items-center">
                <svg class="w-7 h-7 mr-2 brand-logo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <span class="menu-text">Sitoko Admin</span>
            </div>
            <nav class="mt-6">
                <a href="{{ route('pengguna.index') }}" class="nav-item block px-5 py-3 flex items-center">
                    <i class="fas fa-users w-5 text-center mr-2"></i>
                    <span class="menu-text">Pengguna</span>
                </a>
                <a href="{{ route('pendataanmobil.index') }}" class="nav-item block px-5 py-3 flex items-center">
                    <i class="fas fa-car w-5 text-center mr-2"></i>
                    <span class="menu-text">Pendataan Mobil</span>
                </a>
                <a href="{{ route('kreditmobil.index') }}" class="nav-item block px-5 py-3 flex items-center">
                    <i class="fas fa-file-invoice-dollar w-5 text-center mr-2"></i>
                    <span class="menu-text">Penerimaan Mobil</span>
                </a>
                <a href="#" class="nav-item block px-5 py-3 flex items-center">
                    <i class="fas fa-credit-card w-5 text-center mr-2"></i>
                    <span class="menu-text">Pendataan Kredit</span>
                </a>
                <a href="{{ route('merek.index') }}" class="nav-item block px-5 py-3 flex items-center">
                    <i class="fas fa-tags w-5 text-center mr-2"></i>
                    <span class="menu-text">Pendataan Merek</span>
                </a>
                <a href="{{ route('laporanmobil.index') }}" class="nav-item block px-5 py-3 flex items-center">
                    <i class="fas fa-file-alt w-5 text-center mr-2"></i>
                    <span class="menu-text">Laporan Mobil</span>
                </a>
                <a href="#" class="nav-item block px-5 py-3 flex items-center relative">
                    <i class="fas fa-chart-bar w-5 text-center mr-2"></i>
                    <span class="menu-text">Laporan Kredit</span>
                </a>
            </nav>
        </div>
        <div class="p-5 border-t border-blue-500">
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
                <h1 class="text-2xl font-bold text-gray-900">Selamat Datang, {{ auth()->user()->name }}</h1>
                <p class="text-sm text-gray-600 mt-1">Kelola data dengan mudah di dashboard admin Sitoko.</p>
            </div>
            <div class="flex items-center">
                <div
                    class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold mr-2">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
            <div class="stat-card p-5 flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-90">Total Pengguna</p>
                    <p class="text-xl font-semibold">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-2 rounded-full">
                    <i class="fas fa-users text-lg"></i>
                </div>
            </div>
            <div class="stat-card p-5 flex items-center justify-between"
                style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                <div>
                    <p class="text-sm opacity-90">Total Mobil</p>
                    <p class="text-xl font-semibold">{{ $totalMobils }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-2 rounded-full">
                    <i class="fas fa-car text-lg"></i>
                </div>
            </div>
            <div class="stat-card p-5 flex items-center justify-between"
                style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                <div>
                    <p class="text-sm opacity-90">Total Merek</p>
                    <p class="text-xl font-semibold">{{ $totalMerks }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-2 rounded-full">
                    <i class="fas fa-tags text-lg"></i>
                </div>
            </div>
            <div class="stat-card p-5 flex items-center justify-between"
                style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                <div>
                    <p class="text-sm opacity-90">Total Penerimaan Mobil</p>
                    <p class="text-xl font-semibold">{{ $totalKreditMobils }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-2 rounded-full">
                    <i class="fas fa-file-invoice-dollar text-lg"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="col-span-2 card p-5 chart-card">
                <div class="chart-header">
                    <h2 class="text-lg font-semibold text-gray-900">Distribusi Data Sistem</h2>
                    <div class="chart-actions">
                        <button class="chart-btn" id="toggle-doughnut">Ubah Tampilan</button>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="distributionChart"></canvas>
                </div>
                <div class="chart-legend" id="chart-legend"></div>
                <div class="line-chart-container">
                    <canvas id="trendChart"></canvas>
                </div>
            </div>
            <div class="space-y-6">
                <div class="calendar">
                    <div class="calendar-header">
                        <button id="prev-month"><i class="fas fa-chevron-left"></i></button>
                        <h3 id="current-month-year">Oktober 2025</h3>
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
                <div class="card p-5">
                    <h2 class="text-lg font-semibold text-gray-900 mb-3">Aksi Cepat</h2>
                    <div class="grid grid-cols-2 gap-3">
                        <a href="{{ route('pengguna.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100 transition">
                            <div class="bg-blue-600 p-2 rounded-full mb-2">
                                <i class="fas fa-users text-white text-sm"></i>
                            </div>
                            <span class="text-xs font-medium text-gray-900">Kelola Pengguna</span>
                        </a>
                        <a href="{{ route('pendataanmobil.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-3 bg-green-50 rounded-lg hover:bg-green-100 transition">
                            <div class="bg-green-600 p-2 rounded-full mb-2">
                                <i class="fas fa-car text-white text-sm"></i>
                            </div>
                            <span class="text-xs font-medium text-gray-900">Data Mobil</span>
                        </a>
                        <a href="{{ route('kreditmobil.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-3 bg-purple-50 rounded-lg hover:bg-purple-100 transition">
                            <div class="bg-purple-600 p-2 rounded-full mb-2">
                                <i class="fas fa-file-invoice-dollar text-white text-sm"></i>
                            </div>
                            <span class="text-xs font-medium text-gray-900">Penerimaan</span>
                        </a>
                        <a href="{{ route('laporanmobil.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-3 bg-orange-50 rounded-lg hover:bg-orange-100 transition">
                            <div class="bg-orange-600 p-2 rounded-full mb-2">
                                <i class="fas fa-file-alt text-white text-sm"></i>
                            </div>
                            <span class="text-xs font-medium text-gray-900">Laporan Mobil</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        const chartData = {
            labels: ['Pengguna', 'Mobil', 'Penerimaan Mobil', 'Merek'],
            data: [{{ $totalUsers }}, {{ $totalMobils }}, {{ $totalKreditMobils }}, {{ $totalMerks }}],
            colors: ['#3b82f6', '#10b981', '#8b5cf6', '#f59e0b'],
            hoverColors: ['#2563eb', '#059669', '#7c3aed', '#d97706']
        };

        let distributionChart;
        let trendChart;
        let isDoughnut = false;

        function initDistributionChart() {
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
                        hoverOffset: 16
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
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
                            padding: 10,
                            backgroundColor: 'rgba(0, 0, 0, 0.85)',
                            titleFont: { size: 13, weight: '600' },
                            bodyFont: { size: 12 }
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

        function initTrendChart() {
            const ctx = document.getElementById('trendChart').getContext('2d');
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'];
            trendChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: months,
                    datasets: chartData.labels.map((label, index) => ({
                        label: label,
                        data: Array(6).fill(chartData.data[index]),
                        borderColor: chartData.colors[index],
                        backgroundColor: chartData.colors[index] + '33',
                        fill: true,
                        tension: 0.4,
                        pointRadius: 3,
                        pointHoverRadius: 5,
                        borderWidth: 2
                    }))
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    return `${context.dataset.label}: ${context.raw}`;
                                }
                            },
                            padding: 10,
                            backgroundColor: 'rgba(0, 0, 0, 0.85)',
                            titleFont: { size: 13, weight: '600' },
                            bodyFont: { size: 12 }
                        }
                    },
                    scales: {
                        x: { grid: { display: false } },
                        y: {
                            beginAtZero: true,
                            grid: { color: '#e5e7eb' }
                        }
                    },
                    animation: {
                        duration: 1000,
                        easing: 'easeOutQuart'
                    }
                }
            });
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
            initDistributionChart();
        });

        document.addEventListener('DOMContentLoaded', function() {
            initDistributionChart();
            initTrendChart();
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
                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                monthYearElement.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
                const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1).getDay();
                const daysInMonth = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0).getDate();
                let startDay = firstDay === 0 ? 6 : firstDay - 1;

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
