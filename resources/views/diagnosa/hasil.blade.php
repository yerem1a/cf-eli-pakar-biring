<!DOCTYPE html>
<html>
<head>
    <title>Hasil Diagnosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .navbar-custom {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 15px 0;
            margin-bottom: 40px;
            border-radius: 0 0 15px 15px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-avatar {
            width: 42px;
            height: 42px;
            background: white;
            color: #667eea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
        }
        .logout-btn {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 8px 20px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .logout-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }
        .card-result {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            border: none;
            overflow: hidden;
        }
        .card-header-result {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 15px 15px 0 0 !important;
        }
        .result-badge {
            font-size: 1.1rem;
            padding: 8px 20px;
            border-radius: 50px;
        }
        .table-hasil {
            border-radius: 10px;
            overflow: hidden;
            border: 1px solid #e0e0e0;
        }
        .table-hasil thead {
            background: linear-gradient(to right, #f8f9fa, #e9ecef);
        }
        .table-hasil tbody tr:hover {
            background-color: #f8f9fa;
        }
        .progress {
            height: 12px;
            border-radius: 10px;
            margin-top: 5px;
        }
        .percentage-high {
            color: #dc3545;
            font-weight: bold;
        }
        .percentage-medium {
            color: #ffc107;
            font-weight: bold;
        }
        .percentage-low {
            color: #28a745;
            font-weight: bold;
        }
        .btn-action {
            border-radius: 8px;
            padding: 10px 25px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .btn-action:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar dengan User Info -->
    <div class="navbar-custom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bi bi-clipboard2-pulse fs-3 text-white me-3"></i>
                    <h3 class="mb-0 text-white">Sistem Diagnosa Autisme</h3>
                </div>
                <div class="user-info">
                    <div class="d-flex align-items-center">
                        <div class="user-avatar me-3">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <div class="text-white fw-bold">{{ Auth::user()->name }}</div>
                            <div class="text-white-50 small">{{ Auth::user()->username }}</div>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <!-- Card Hasil Diagnosa -->
        <div class="card card-result">
            <div class="card-header card-header-result">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="mb-0"><i class="bi bi-graph-up me-2"></i>Hasil Diagnosa</h2>
                        <p class="mb-0 opacity-75">Berdasarkan gejala yang dipilih</p>
                    </div>
                    <div>
                        <span class="result-badge bg-white text-primary">
                            <i class="bi bi-calendar-check me-1"></i>
                            {{ now()->format('d M Y') }}
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="card-body p-4">
                <!-- Tabel Hasil -->
                <div class="table-responsive">
                    <table class="table table-hover table-hasil">
                        <thead>
                            <tr>
                                <th width="50%">Gangguan</th>
                                <th width="30%">Persentase (%)</th>
                                <th width="20%">Progress</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $highest = max(array_column($hasil, 'cf_hasil'));
                            @endphp
                            
                            @foreach ($hasil as $h)
                                @php
                                    $percentage = $h['cf_hasil'];
                                    $colorClass = '';
                                    if ($percentage >= 70) {
                                        $colorClass = 'percentage-high';
                                        $progressColor = 'bg-danger';
                                    } elseif ($percentage >= 40) {
                                        $colorClass = 'percentage-medium';
                                        $progressColor = 'bg-warning';
                                    } else {
                                        $colorClass = 'percentage-low';
                                        $progressColor = 'bg-success';
                                    }
                                    
                                    $isHighest = ($percentage == $highest);
                                @endphp
                                <tr class="@if($isHighest) table-primary @endif">
                                    <td>
                                        <strong>{{ $h['gangguan'] }}</strong>
                                        @if($isHighest)
                                            <span class="badge bg-success ms-2"><i class="bi bi-trophy"></i> Tertinggi</span>
                                        @endif
                                    </td>
                                    <td class="{{ $colorClass }}">
                                        <strong>{{ number_format($percentage, 2) }}%</strong>
                                    </td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar {{ $progressColor }}" 
                                                 role="progressbar" 
                                                 style="width: {{ $percentage }}%"
                                                 aria-valuenow="{{ $percentage }}" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Summary -->
                @if(!empty($hasil))
                    @php
                        $topResult = collect($hasil)->sortByDesc('cf_hasil')->first();
                    @endphp
                    <div class="alert alert-info mt-4">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-info-circle-fill fs-4 me-3"></i>
                            <div>
                                <h5 class="mb-1">Kesimpulan Diagnosa</h5>
                                <p class="mb-0">
                                    Berdasarkan analisis gejala, kemungkinan tertinggi adalah 
                                    <strong>{{ $topResult['gangguan'] }}</strong> 
                                    dengan persentase <strong>{{ number_format($topResult['cf_hasil'], 2) }}%</strong>.
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-between mt-4">
                    <div>
                        <a href="{{ route('diagnosa.index') }}" class="btn btn-primary btn-action me-2">
                            <i class="bi bi-arrow-clockwise me-2"></i> Diagnosa Ulang
                        </a>
                        <a href="{{ route('gejala.index') }}" class="btn btn-outline-secondary btn-action">
                            <i class="bi bi-clipboard-data me-2"></i> Data Gejala
                        </a>
                    </div>
                    <div>
                        <button onclick="window.print()" class="btn btn-outline-dark btn-action me-2">
                            <i class="bi bi-printer me-2"></i> Cetak Hasil
                        </button>
                        <a href="{{ route('home') }}" class="btn btn-outline-primary btn-action">
                            <i class="bi bi-house me-2"></i> Dashboard
                        </a>
                    </div>
                </div>

                <!-- Informasi Tambahan -->
                <div class="mt-4 pt-3 border-top">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h6><i class="bi bi-exclamation-triangle text-warning me-2"></i>Informasi</h6>
                                    <p class="small mb-0">
                                        Hasil ini berdasarkan analisis sistem dengan metode Certainty Factor. 
                                        Disarankan untuk konsultasi dengan profesional kesehatan untuk diagnosis yang akurat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-0 bg-light">
                                <div class="card-body">
                                    <h6><i class="bi bi-clock-history text-primary me-2"></i>Riwayat</h6>
                                    <p class="small mb-0">
                                        Diagnosa dilakukan pada: {{ now()->format('d F Y H:i') }}<br>
                                        Oleh: {{ Auth::user()->name }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script untuk efek visual -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi progress bar
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                    bar.style.transition = 'width 1.5s ease-in-out';
                }, 300);
            });
        });
    </script>
</body>
</html>