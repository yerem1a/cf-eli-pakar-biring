<!DOCTYPE html>
<html>
<head>
    <title>Menu Data Gejala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f4f8fb;
            font-family: 'Segoe UI', sans-serif;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: bold;
        }
        .card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 40px;
        }
        table th, table td {
            vertical-align: middle;
        }
        table tbody tr:hover {
            background-color: #f1f1f1;
        }
        .btn-sm {
            padding: 4px 10px;
            font-size: 0.85rem;
        }
        .navbar-top {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 15px 0;
            margin-bottom: 30px;
            border-radius: 10px;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            background-color: #4e73df;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .logout-btn {
            background-color: #e74a3b;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            transition: all 0.3s;
        }
        .logout-btn:hover {
            background-color: #c53030;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Navbar dengan User Info dan Logout -->
        <div class="navbar-top">
            <div class="d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bi bi-clipboard-data fs-4 text-primary me-2"></i>
                    <h4 class="mb-0">Sistem Diagnosa Autisme</h4>
                </div>
                <div class="user-info">
                    <div class="d-flex align-items-center">
                        <div class="user-avatar me-2">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <strong>{{ Auth::user()->name }}</strong>
                            <div class="small text-muted">{{ Auth::user()->username }}</div>
                        </div>
                    </div>
                    <form action="{{ route('logout') }}" method="POST" class="ms-3">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <h1>🧾 Menu Data Gejala</h1>

        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <!-- Form Tambah Gejala -->
        <div class="card">
            <h5 class="mb-4">➕ Tambah Gejala Baru</h5>
            <form action="{{ route('gejala.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="gangguan_id" class="form-label">Gangguan</label>
                    <select name="gangguan_id" class="form-control @error('gangguan_id') is-invalid @enderror" required>
                        @foreach ($gangguan as $g)
                            <option value="{{ $g->id }}">{{ $g->nama_gangguan }}</option>
                        @endforeach
                    </select>
                    @error('gangguan_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="pertanyaan" class="form-label">Pertanyaan Gejala</label>
                    <input type="text" name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" required>
                    @error('pertanyaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="cf_pakar" class="form-label">CF Pakar (0-1)</label>
                    <input type="number" step="0.1" min="0" max="1" name="cf_pakar" class="form-control @error('cf_pakar') is-invalid @enderror" required>
                    @error('cf_pakar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save me-1"></i> Simpan Gejala
                </button>
            </form>
        </div>

        <!-- Tabel Data Gejala -->
        <div class="card">
            <h5 class="mb-4">📋 Data Gejala</h5>
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-light">
                    <tr>
                        <th>Gangguan</th>
                        <th>Pertanyaan</th>
                        <th>CF Pakar</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($gejala as $g)
                        <tr>
                            <td>{{ $g->gangguan->nama_gangguan }}</td>
                            <td>{{ $g->pertanyaan }}</td>
                            <td>{{ $g->rules->first()->cf_pakar ?? '-' }}</td>
                            <td>
                                <a href="{{ route('gejala.edit', $g->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('gejala.destroy', $g->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <a href="{{ route('diagnosa.index') }}" class="btn btn-primary mt-3">
                <i class="bi bi-search me-1"></i> Ke Diagnosa
            </a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>