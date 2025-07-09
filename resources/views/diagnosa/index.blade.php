<!DOCTYPE html>
<html>
<head>
    <title>Sistem Pakar CF</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Sistem Pakar Certainty Factor</h1>
        <form action="{{ route('diagnosa.hasil') }}" method="POST">
            @csrf
            @foreach ($gangguan as $g)
                <h3>{{ $g->nama_gangguan }}</h3>
                @foreach ($g->gejala as $gejala)
                    <div class="form-group mb-3">
                        <label>{{ $gejala->pertanyaan }}</label>
                        <select name="gejala_{{ $gejala->id }}" class="form-control">
                            @foreach ($nilaiUser as $nu)
                                <option value="{{ $nu->nilai }}">{{ $nu->keterangan }}</option>
                            @endforeach
                        </select>
                    </div>
                @endforeach
            @endforeach
            <button type="submit" class="btn btn-primary">Diagnosa</button>
            <a href="{{ route('gejala.index') }}" class="btn btn-secondary">Data Gejala</a>
        </form>
    </div>
</body>
</html>