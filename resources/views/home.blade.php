<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .dashboard-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }
        .welcome-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 2rem;
        }
        .stat-card {
            border-radius: 10px;
            padding: 1.5rem;
            color: white;
            text-align: center;
        }
        .stat-card-1 { background: linear-gradient(135deg, #4CAF50 0%, #2E7D32 100%); }
        .stat-card-2 { background: linear-gradient(135deg, #2196F3 0%, #0D47A1 100%); }
        .stat-card-3 { background: linear-gradient(135deg, #FF9800 0%, #EF6C00 100%); }
        .stat-card-4 { background: linear-gradient(135deg, #9C27B0 0%, #6A1B9A 100%); }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-clipboard2-pulse me-2"></i>
                Sistem Diagnosa Autisme
            </a>
            <div class="d-flex align-items-center">
                <span class="text-white me-3">
                    <i class="bi bi-person-circle me-1"></i>
                    {{ Auth::user()->name }}
                </span>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Welcome Card -->
        <div class="welcome-card mb-4">
            <h1><i class="bi bi-house-door me-2"></i>Dashboard</h1>
            <p class="mb-0">Selamat datang, <strong>{{ Auth::user()->name }}</strong>! Sistem siap digunakan.</p>
        </div>

        <!-- Stat Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="stat-card stat-card-1">
                    <i class="bi bi-clipboard-data fs-1"></i>
                    <h4 class="mt-2">
                        {{ \App\Models\Gejala::count() ?? 0 }}
                    </h4>
                    <p class="mb-0">Total Gejala</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card stat-card-2">
                    <i class="bi bi-activity fs-1"></i>
                    <h4 class="mt-2">
                        {{ \App\Models\Gangguan::count() ?? 0 }}
                    </h4>
                    <p class="mb-0">Jenis Gangguan</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card stat-card-3">
                    <i class="bi bi-file-earmark-text fs-1"></i>
                    <h4 class="mt-2">
                        {{ \App\Models\HasilDiagnosa::count() ?? 0 }}
                    </h4>
                    <p class="mb-0">Diagnosa Dilakukan</p>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="stat-card stat-card-4">
                    <i class="bi bi-people fs-1"></i>
                    <h4 class="mt-2">
                        {{ \App\Models\User::count() ?? 1 }}
                    </h4>
                    <p class="mb-0">Pengguna</p>
                </div>
            </div>
        </div>

        <!-- Action Cards -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="dashboard-card">
                    <h4><i class="bi bi-calculator text-primary me-2"></i>Diagnosa</h4>
                    <p>Lakukan diagnosa autisme menggunakan metode Certainty Factor.</p>
                    <a href="{{ route('diagnosa.index') }}" class="btn btn-primary">
                        <i class="bi bi-play-circle me-2"></i>Mulai Diagnosa
                    </a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="dashboard-card">
                    <h4><i class="bi bi-clipboard-data text-success me-2"></i>Data Gejala</h4>
                    <p>Kelola data gejala dan aturan diagnosa.</p>
                    <a href="{{ route('gejala.index') }}" class="btn btn-success">
                        <i class="bi bi-gear me-2"></i>Kelola Gejala
                    </a>
                </div>
            </div>
        </div>

        <!-- Info -->
        <div class="dashboard-card">
            <h5><i class="bi bi-info-circle text-info me-2"></i>Informasi Sistem</h5>
            <p>Sistem ini menggunakan metode Certainty Factor untuk mendiagnosa autisme dengan mempertimbangkan tingkat keyakinan terhadap gejala yang muncul.</p>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li>Gunakan menu Diagnosa untuk memulai</li>
                        <li>Kelola data gejala di menu Data Gejala</li>
                        <li>Hasil diagnosa disimpan secara otomatis</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul>
                        <li>Sistem hanya untuk prediksi awal</li>
                        <li>Konsultasi dengan profesional tetap diperlukan</li>
                        <li>Pastikan semua gejala diisi dengan benar</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>