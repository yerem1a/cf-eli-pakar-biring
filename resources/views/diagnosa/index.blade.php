<!DOCTYPE html>
<html>
<head>
    <title>Diagnosa Autisme - Certainty Factor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f0f4f8;
            font-family: 'Segoe UI', sans-serif;
        }
        h1 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: bold;
        }
        h4 {
            font-size: 1.2rem;
            color: #0d6efd;
            margin-top: 2rem;
            margin-bottom: 1rem;
        }
        label {
            font-weight: 500;
        }
        .card-diagnosa {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-top: 2rem;
        }
        .form-label-small {
            font-size: 0.9rem;
        }
        select {
            height: 38px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card card-diagnosa">
            <h1>🧠 Sistem Pakar Certainty Factor</h1>
            <form action="{{ route('diagnosa.hasil') }}" method="POST">
                @csrf

                @foreach ($gangguan as $g)
                    <h4>📌 {{ $g->nama_gangguan }}</h4>
                    @foreach ($g->gejala as $gejala)
                        <div class="row align-items-center mb-3">
                            <div class="col-md-8 col-sm-12">
                                <label class="form-label-small">{{ $gejala->pertanyaan }}</label>
                            </div>
                            <div class="col-md-4 col-sm-12">
                                <select name="gejala_{{ $gejala->id }}" class="form-select form-select-sm">
                                    @foreach ($nilaiUser as $nu)
                                        <option value="{{ $nu->nilai }}">{{ $nu->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endforeach
                @endforeach

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary px-4">🔍 Diagnosa</button>
                    <a href="{{ route('gejala.index') }}" class="btn btn-secondary px-4">🗂️ Data Gejala</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
