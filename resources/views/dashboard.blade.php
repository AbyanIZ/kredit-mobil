<!DOCTYPE html>
<html lang="en">

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
            background: #f8fafc;
            min-height: 100vh;
            overflow: hidden;
        }

        .sidebar {
            background: linear-gradient(180deg, #1e3a8a 0%, #1e40af 100%);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .nav-item {
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
            padding-left: 1.5rem;
            margin: 0.5rem 0;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #3b82f6;
            transform: translateX(5px);
        }

        .nav-item.active {
            background: rgba(255, 255, 255, 0.15);
            border-left: 4px solid #3b82f6;
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-card {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            border-radius: 16px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .logout-btn {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            box-shadow: 0 4px 10px rgba(220, 38, 38, 0.2);
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(220, 38, 38, 0.3);
        }

        .brand-logo {
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
        }

        .calendar {
            background: white;
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .calendar-header {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            color: white;
            padding: 12px;
            text-align: center;
            font-weight: 600;
            border-radius: 16px 16px 0 0;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 6px;
            padding: 12px;
        }

        .calendar-day {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 36px;
            border-radius: 8px;
            font-size: 13px;
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
            height: 36px;
            font-size: 13px;
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
            width: 20px;
            height: 20px;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .quick-action {
            transition: all 0.3s ease;
            border-radius: 12px;
        }

        .quick-action:hover {
            transform: translateY(-3px);
            background: #f1f5f9 !important;
        }

        .main-container {
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        .main-content {
            flex: 1;
            padding: 2.5rem;
            margin-left: 16rem;
            overflow-y: auto;
            height: 100vh;
            background: #f8fafc;
        }

        .stats-container {
            max-height: calc(100vh - 200px);
        }

        .chart-container {
            position: relative;
            height: 320px;
            width: 100%;
        }

        .line-chart-container {
            position: relative;
            height: 200px;
            width: 100%;
            margin-top: 30px;
            border-radius: 12px;
            background: white;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.05);
            padding: 16px;
        }

        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .chart-legend {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            margin-right: 20px;
        }

        .legend-color {
            width: 14px;
            height: 14px;
            border-radius: 4px;
            margin-right: 6px;
        }

        .legend-text {
            font-size: 13px;
            color: #4b5563;
        }

        .chart-value {
            font-weight: 600;
            margin-left: 6px;
        }

        .chart-actions {
            display: flex;
            gap: 12px;
        }

        .chart-btn {
            background: #f3f4f6;
            border: none;
            padding: 6px 12px;
            border-radius: 8px;
            font-size: 13px;
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
            border-radius: 16px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
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
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>

<body class="main-container">
    <!-- Sidebar -->
    <aside class="sidebar w-64 text-white h-full fixed flex flex-col justify-between">
        <div>
            <div class="p-6 text-2xl font-semibold border-b border-blue-500 flex items-center">
                <svg class="w-8 h-8 mr-3 brand-logo" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                </svg>
                <span class="menu-text">Sitoko Admin</span>
            </div>
            <nav class="mt-8">
                <a href="{{ route('pengguna.index') }}" class="nav-item block px-6 py-3.5 flex items-center">
                    <i class="fas fa-users w-5 text-center mr-3"></i>
                    <span class="menu-text">Pengguna</span>
                </a>
                <a href="{{ route('pendataanmobil.index') }}" class="nav-item block px-6 py-3.5 flex items-center">
                    <i class="fas fa-car w-5 text-center mr-3"></i>
                    <span class="menu-text">Pendataan Mobil</span>
                </a>
                <a href="{{ route('kreditmobil.index') }}" class="nav-item block px-6 py-3.5 flex items-center">
                    <i class="fas fa-file-invoice-dollar w-5 text-center mr-3"></i>
                    <span class="menu-text">Penerimaan Mobil</span>
                </a>
                <a href="#" class="nav-item block px-6 py-3.5 flex items-center">
                    <i class="fas fa-credit-card w-5 text-center mr-3"></i>
                    <span class="menu-text">Pendataan Kredit</span>
                </a>
                <a href="{{ route('merek.index') }}" class="nav-item block px-6 py-3.5 flex items-center">
                    <i class="fas fa-tags w-5 text-center mr-3"></i>
                    <span class="menu-text">Pendataan Merek</span>
                </a>
                <a href="{{ route('laporanmobil.index') }}" class="nav-item block px-6 py-3.5 flex items-center">
                    <i class="fas fa-file-alt w-5 text-center mr-3"></i>
                    <span class="menu-text">Laporan Mobil</span>
                </a>
                <a href="#" class="nav-item block px-6 py-3.5 flex items-center relative">
                    <i class="fas fa-chart-bar w-5 text-center mr-3"></i>
                    <span class="menu-text">Laporan Kredit</span>
                </a>
            </nav>
        </div>

        <div class="p-6 border-t border-blue-500">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="logout-btn w-full py-3.5 rounded-xl font-semibold flex items-center justify-center">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <span class="menu-text">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <main class="main-content">
        <div class="flex justify-between items-center mb-10">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Selamat Datang, {{ auth()->user()->name }}</h1>
                <p class="text-gray-600 mt-1">Kelola data dengan mudah di dashboard admin Sitoko.</p>
            </div>
            <div class="flex items-center">
                <div
                    class="w-12 h-12 rounded-full bg-blue-600 flex items-center justify-center text-white font-semibold mr-3">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-900">{{ auth()->user()->name }}</p>
                    <p class="text-xs text-gray-500">Administrator</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <div class="stat-card p-6 flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-90">Total Pengguna</p>
                    <p class="text-2xl font-semibold">{{ $totalUsers }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-users text-xl"></i>
                </div>
            </div>

            <div class="stat-card p-6 flex items-center justify-between"
                style="background: linear-gradient(135deg, #10b981 0%, #059669 100%);">
                <div>
                    <p class="text-sm opacity-90">Total Mobil</p>
                    <p class="text-2xl font-semibold">{{ $totalMobils }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-car text-xl"></i>
                </div>
            </div>

            <div class="stat-card p-6 flex items-center justify-between"
                style="background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);">
                <div>
                    <p class="text-sm opacity-90">Total Kredit Mobil</p>
                    <p class="text-2xl font-semibold">{{ $totalKredits }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-file-invoice-dollar text-xl"></i>
                </div>
            </div>

            <div class="stat-card p-6 flex items-center justify-between"
                style="background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);">
                <div>
                    <p class="text-sm opacity-90">Total Merek</p>
                    <p class="text-2xl font-semibold">{{ $totalMerks }}</p>
                </div>
                <div class="bg-white bg-opacity-20 p-3 rounded-full">
                    <i class="fas fa-tags text-xl"></i>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 stats-container">
            <div class="col-span-2 card p-6 chart-card">
                <div class="chart-header">
                    <h2 class="text-xl font-semibold text-gray-900">Distribusi Data Sistem</h2>
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
                    <div class="calendar-header flex justify-between items-center">
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

                <div class="card p-6">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Aksi Cepat</h2>
                    <div class="grid grid-cols-2 gap-4">
                        <a href="{{ route('pengguna.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-4 bg-blue-50 rounded-xl hover:bg-blue-100 transition">
                            <div class="bg-blue-600 p-3 rounded-full mb-2">
                                <i class="fas fa-users text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Kelola Pengguna</span>
                        </a>

                        <a href="{{ route('pendataanmobil.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-4 bg-green-50 rounded-xl hover:bg-green-100 transition">
                            <div class="bg-green-600 p-3 rounded-full mb-2">
                                <i class="fas fa-car text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Data Mobil</span>
                        </a>

                        <a href="{{ route('kreditmobil.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-4 bg-purple-50 rounded-xl hover:bg-purple-100 transition">
                            <div class="bg-purple-600 p-3 rounded-full mb-2">
                                <i class="fas fa-file-invoice-dollar text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Penerimaan</span>
                        </a>

                        <a href="{{ route('laporanmobil.index') }}"
                            class="quick-action flex flex-col items-center justify-center p-4 bg-orange-50 rounded-xl hover:bg-orange-100 transition">
                            <div class="bg-orange-600 p-3 rounded-full mb-2">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                            <span class="text-sm font-medium text-gray-900">Laporan Mobil</span>
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
                        hoverOffset: 20
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
                            backgroundColor: 'rgba(0, 0, 0, 0.85)',
                            titleFont: {
                                size: 14,
                                weight: '600'
                            },
                            bodyFont: {
                                size: 13
                            }
                        }
                    },
                    cutout: isDoughnut ? '65%' : '0%',
                    animation: {
                        animateScale: true,
                        animateRotate: true,
                        duration: 1200,
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
                        data: Array(6).fill(chartData.data[index]), // Static data for simplicity
                        borderColor: chartData.colors[index],
                        backgroundColor: chartData.colors[index] + '33', // Add transparency
                        fill: true,
                        tension: 0.4,
                        pointRadius: 4,
                        pointHoverRadius: 6,
                        borderWidth: 2
                    }))
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
                                    return `${context.dataset.label}: ${context.raw}`;
                                }
                            },
                            padding: 12,
                            backgroundColor: 'rgba(0, 0, 0, 0.85)',
                            titleFont: {
                                size: 14,
                                weight: '600'
                            },
                            bodyFont: {
                                size: 13
                            }
                        }
                    },
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true,
                            grid: {
                                color: '#e5e7eb'
                            }
                        }
                    },
                    animation: {
                        duration: 1200,
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
