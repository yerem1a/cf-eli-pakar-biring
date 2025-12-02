@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #a9cce3; /* biru muda seperti di gambar */
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10">
            <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                <div class="row g-0">
                    
                    <!-- Gambar di kiri -->
                    <div class="col-md-6 d-none d-md-block bg-white">
                        <img src="{{ asset('images/autisme.jpeg') }}" alt="Autisme" class="img-fluid h-100 w-100" style="object-fit: cover;">
                    </div>

                    <!-- Form di kanan -->
                    <div class="col-md-6 bg-light p-4">
                        <div class="text-center mb-4">
                            <h4 class="fw-semibold text-primary">Registrasi Akun Baru</h4>
                            <p class="small text-muted">Silakan isi data untuk mendaftar</p>
                        </div>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            {{-- Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Email --}}
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Confirm Password --}}
                            <div class="mb-3">
                                <label for="password-confirm" class="form-label">Konfirmasi Password</label>
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required>
                            </div>

                            {{-- Submit --}}
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary fw-semibold">
                                    Daftar Sekarang
                                </button>
                            </div>
                        </form>

                        <div class="text-center mt-3">
                            <small>Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></small>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
