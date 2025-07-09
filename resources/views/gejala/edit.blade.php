<!DOCTYPE html>
<html>
<head>
    <title>Edit Gejala</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Gejala</h1>
        <form action="{{ route('gejala.update', $gejala->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="gangguan_id" class="form-label">Gangguan</label>
                <select name="gangguan_id" class="form-control @error('gangguan_id') is-invalid @enderror" required>
                    @foreach ($gangguan as $g)
                        <option value="{{ $g->id }}" {{ $gejala->gangguan_id == $g->id ? 'selected' : '' }}>{{ $g->nama_gangguan }}</option>
                    @endforeach
                </select>
                @error('gangguan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pertanyaan" class="form-label">Pertanyaan Gejala</label>
                <input type="text" name="pertanyaan" class="form-control @error('pertanyaan') is-invalid @enderror" value="{{ $gejala->pertanyaan }}" required>
                @error('pertanyaan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cf_pakar" class="form-label">CF Pakar (0-1)</label>
                <input type="number" step="0.1" min="0" max="1" name="cf_pakar" class="form-control @error('cf_pakar') is-invalid @enderror" value="{{ $rule->cf_pakar ?? '' }}" required>
                @error('cf_pakar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('gejala.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>