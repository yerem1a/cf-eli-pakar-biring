<!DOCTYPE html>
<html>
<head>
    <title>Diagnosa Autisme - Certainty Factor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        /* Alert untuk session messages */
        .alert-flash {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            min-width: 300px;
            animation: slideIn 0.3s ease-out;
        }
        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        /* Styling untuk user yang login */
        .navbar-diagnosa {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 15px 0;
            margin-bottom: 30px;
            border-radius: 0 0 15px 15px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
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
        .card-diagnosa {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border: none;
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .header-diagnosa {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f0f0f0;
        }
        .header-diagnosa h1 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
            font-size: 2.2rem;
        }
        .gangguan-card {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-left: 5px solid #667eea;
            transition: transform 0.3s;
        }
        .gangguan-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .gangguan-title {
            color: #2c3e50;
            font-weight: 600;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .gejala-item {
            background: white;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
            border: 1px solid #e0e0e0;
            transition: all 0.3s;
        }
        .gejala-item:hover {
            border-color: #667eea;
            box-shadow: 0 3px 10px rgba(102, 126, 234, 0.1);
        }
        .gejala-question {
            font-weight: 500;
            color: #333;
            margin-bottom: 0.5rem;
        }
        .form-select-custom {
            border-radius: 8px;
            border: 2px solid #e0e0e0;
            padding: 8px 15px;
            transition: all 0.3s;
        }
        .form-select-custom:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .btn-diagnosa {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-diagnosa:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        .btn-secondary {
            background: #6c757d;
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-secondary:hover {
            background: #5a6268;
            transform: translateY(-3px);
        }
        .info-box {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-left: 5px solid #2196f3;
        }
        .nav-links {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            margin-bottom: 2rem;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
        }
    </style>
</head>
<body>
    <!-- Session Flash Messages -->
    @if(session('success'))
    <div class="alert alert-success alert-flash alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    
    @if(session('error'))
    <div class="alert alert-danger alert-flash alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-triangle me-2"></i>
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- NAVBAR SELALU ADA KARENA HARUS LOGIN -->
    <div class="navbar-diagnosa">
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
                    <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                        @csrf
                        <button type="button" class="logout-btn" onclick="confirmLogout()">
                            <i class="bi bi-box-arrow-right me-2"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <!-- Navigation Links -->
        <div class="nav-links">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm me-2">
                        <i class="bi bi-house"></i> Dashboard
                    </a>
                    <a href="{{ route('gejala.index') }}" class="btn btn-outline-secondary btn-sm me-2">
                        <i class="bi bi-clipboard-data"></i> Data Gejala
                    </a>
                    <a href="{{ route('diagnosa.index') }}" class="btn btn-outline-success btn-sm">
                        <i class="bi bi-arrow-clockwise"></i> Refresh
                    </a>
                </div>
                <div class="text-muted small">
                    <i class="bi bi-calendar-check me-1"></i>
                    {{ now()->format('d M Y H:i') }}
                </div>
            </div>
        </div>

        <!-- Info Box -->
        <div class="info-box">
            <div class="d-flex align-items-start">
                <i class="bi bi-info-circle-fill fs-4 text-primary me-3"></i>
                <div>
                    <h5 class="mb-2">Petunjuk Pengisian</h5>
                    <p class="mb-0">
                        Pilih tingkat keyakinan Anda terhadap setiap gejala yang ditampilkan. 
                        Gunakan skala dari "Sangat Tidak Yakin" hingga "Sangat Yakin" untuk setiap pertanyaan.
                        Sistem akan menghitung kemungkinan gangguan berdasarkan jawaban Anda.
                    </p>
                </div>
            </div>
        </div>

        <!-- Main Diagnosa Card -->
        <div class="card-diagnosa">
            <div class="header-diagnosa">
                <h1><i class="bi bi-calculator me-2"></i>Sistem Pakar Certainty Factor</h1>
                <p class="text-muted mb-0">Diagnosa Autisme Berbasis Metode Certainty Factor</p>
            </div>

            <form action="{{ route('diagnosa.hasil') }}" method="POST" id="diagnosaForm">
                @csrf

                @foreach ($gangguan as $g)
                    <div class="gangguan-card">
                        <h4 class="gangguan-title">
                            <i class="bi bi-clipboard-check text-primary"></i>
                            {{ $g->nama_gangguan }}
                        </h4>
                        
                        @foreach ($g->gejala as $gejala)
                            <div class="gejala-item">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-md-7 col-sm-12 mb-2 mb-md-0">
                                        <div class="gejala-question">
                                            {{ $loop->iteration }}. {{ $gejala->pertanyaan }}
                                        </div>
                                        <small class="text-muted">
                                            <i class="bi bi-info-circle me-1"></i>
                                            CF Pakar: {{ $gejala->rules->first()->cf_pakar ?? '0.0' }}
                                        </small>
                                    </div>
                                    <div class="col-lg-4 col-md-5 col-sm-12">
                                        <select name="gejala_{{ $gejala->id }}" 
                                                class="form-select form-select-custom" required>
                                            <option value="">Pilih Keyakinan</option>
                                            @foreach ($nilaiUser as $nu)
                                                <option value="{{ $nu->nilai }}">
                                                    {{ $nu->keterangan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach

                <!-- Action Buttons -->
                <div class="mt-4 pt-3 border-top">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <button type="submit" class="btn btn-diagnosa">
                                <i class="bi bi-search me-2"></i> Proses Diagnosa
                            </button>
                            <button type="reset" class="btn btn-outline-secondary ms-2" id="resetBtn">
                                <i class="bi bi-arrow-counterclockwise me-2"></i> Reset Form
                            </button>
                        </div>
                        <div>
                            <a href="{{ route('gejala.index') }}" class="btn btn-secondary">
                                <i class="bi bi-clipboard-data me-2"></i> Kelola Gejala
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer Information -->
        <div class="text-center text-muted small mt-4 mb-5">
            <p>
                <i class="bi bi-shield-check me-1"></i>
                Sistem ini menggunakan metode Certainty Factor untuk perhitungan kemungkinan gangguan.
                <br>
                <i class="bi bi-exclamation-triangle me-1"></i>
                Hasil diagnosa bersifat prediksi dan perlu dikonfirmasi oleh tenaga medis profesional.
            </p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Script untuk efek visual -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi saat memilih select
            const selects = document.querySelectorAll('.form-select-custom');
            selects.forEach(select => {
                select.addEventListener('change', function() {
                    this.style.borderColor = '#28a745';
                    this.style.boxShadow = '0 0 0 0.2rem rgba(40, 167, 69, 0.25)';
                    
                    setTimeout(() => {
                        this.style.borderColor = '';
                        this.style.boxShadow = '';
                    }, 1000);
                });
            });

            // Confirmation sebelum submit diagnosa
            const diagnosaForm = document.getElementById('diagnosaForm');
            if (diagnosaForm) {
                diagnosaForm.addEventListener('submit', function(e) {
                    const selectedCount = document.querySelectorAll('.form-select-custom:not([value=""])').length;
                    if (selectedCount === 0) {
                        e.preventDefault();
                        alert('Silakan pilih setidaknya satu gejala sebelum melanjutkan.');
                        return false;
                    }
                    
                    // Tampilkan loading
                    showLoading('Memproses diagnosa...');
                });
            }

            // Reset button
            const resetBtn = document.getElementById('resetBtn');
            if (resetBtn) {
                resetBtn.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin mereset semua pilihan?')) {
                        selects.forEach(select => {
                            select.value = '';
                        });
                    }
                });
            }

            // Auto close flash messages setelah 5 detik
            setTimeout(function() {
                const alerts = document.querySelectorAll('.alert-flash');
                alerts.forEach(alert => {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);
        });

        // Confirm logout
        function confirmLogout() {
            if (confirm('Apakah Anda yakin ingin logout?')) {
                // Tampilkan loading
                showLoading('Logging out...');
                
                // Submit form setelah 1 detik
                setTimeout(() => {
                    document.getElementById('logoutForm').submit();
                }, 1000);
            }
        }

        // Show loading overlay
        function showLoading(message = 'Memproses...') {
            const overlay = document.createElement('div');
            overlay.id = 'loadingOverlay';
            overlay.style.position = 'fixed';
            overlay.style.top = '0';
            overlay.style.left = '0';
            overlay.style.width = '100%';
            overlay.style.height = '100%';
            overlay.style.backgroundColor = 'rgba(0,0,0,0.7)';
            overlay.style.zIndex = '99999';
            overlay.style.display = 'flex';
            overlay.style.flexDirection = 'column';
            overlay.style.justifyContent = 'center';
            overlay.style.alignItems = 'center';
            overlay.style.color = 'white';
            
            const spinner = document.createElement('div');
            spinner.className = 'spinner-border';
            spinner.style.width = '3rem';
            spinner.style.height = '3rem';
            spinner.style.marginBottom = '1rem';
            
            const text = document.createElement('div');
            text.textContent = message;
            text.style.fontSize = '1.2rem';
            
            overlay.appendChild(spinner);
            overlay.appendChild(text);
            document.body.appendChild(overlay);
        }
    </script>
</body>
</html>