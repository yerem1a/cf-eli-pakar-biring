<!DOCTYPE html>
<html>
<head>
    <title>Hasil Diagnosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Hasil Diagnosa</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Gangguan</th>
                    <th>Persentase (%)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hasil as $h)
                    <tr>
                        <td>{{ $h['gangguan'] }}</td>
                        <td>{{ number_format($h['cf_hasil'], 2) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('diagnosa.index') }}" class="btn btn-primary">Diagnosa Ulang</a>
        <a href="{{ route('gejala.index') }}" class="btn btn-secondary">Data Gejala</a>
    </div>
</body>
</html>