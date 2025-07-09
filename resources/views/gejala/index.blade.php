<!DOCTYPE html>
<html>
<head>
    <title>Menu Data Gejala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Menu Data Gejala</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Form Tambah Gejala -->
        <form action="{{ route('gejala.store') }}" method="POST" class="mb-4">
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
            <button type="submit" class="btn btn-primary">Tambah Gejala</button>
        </form>

        <!-- Tabel Data Gejala -->
        <table class="table">
            <thead>
                <tr>
                    <th>Gangguan</th>
                    <th>Pertanyaan</th>
                    <th>CF Pakar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($gejala as $g)
                    <tr>
                        <td>{{ $g->gangguan->nama_gangguan }}</td>
                        <td>{{ $g->pertanyaan }}</td>
                        <td>{{ $g->rules->first()->cf_pakar ?? '-' }}</td>
                        <td>
                            <a href="{{ route('gejala.edit', $g->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('gejala.destroy', $g->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('diagnosa.index') }}" class="btn btn-primary">Ke Diagnosa</a>
    </div>
</body>
</html>