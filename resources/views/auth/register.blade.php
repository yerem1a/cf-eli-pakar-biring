@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #a9cce3;
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
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autofocus>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Username --}}
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required
                                    placeholder="Masukkan username">
                                <small class="text-muted">Username akan digunakan untuk login</small>
                                @error('username')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Password --}}
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" 
                                    name="password" required>
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

{{-- JavaScript untuk validasi username --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    const usernameInput = document.getElementById('username');
    
    // Mencegah input karakter @ di username
    usernameInput.addEventListener('input', function() {
        this.value = this.value.replace(/@/g, '');
    });
    
    // Validasi saat submit
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const username = usernameInput.value.trim();
        
        // Validasi: username tidak boleh kosong
        if (!username) {
            e.preventDefault();
            alert('Username tidak boleh kosong');
            return;
        }
        
        // Validasi: username tidak boleh mengandung spasi
        if (username.includes(' ')) {
            e.preventDefault();
            alert('Username tidak boleh mengandung spasi');
            return;
        }
    });
});
</script>
@endsection