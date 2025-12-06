@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden" style="background-color: #e7f0fa;">
                <div class="row g-0">
                    <!-- Gambar di Kiri -->
                    <div class="col-md-6 d-none d-md-block">
                        <img src="{{ asset('images/autisme.jpeg') }}" alt="Autisme Illustration"
                            class="img-fluid h-100" style="object-fit: cover;">
                    </div>

                    <!-- Form Login di Kanan -->
                    <div class="col-md-6 p-4">
                        <div class="text-center mb-4">
                            <h5 class="fw-bold text-primary">Login ke Akun Anda</h5>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Username -->
                            <div class="mb-3">
                                <label for="username" class="form-label text-dark">Username</label>
                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ old('username') }}" required autocomplete="username" autofocus
                                    placeholder="Masukkan username Anda">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label text-dark">Password</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label text-dark" for="remember">
                                    Ingat Saya
                                </label>
                            </div>

                            <!-- Submit -->
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary px-4">
                                    Login
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">
                                        Lupa Password?
                                    </a>
                                @endif
                            </div>
                        </form>

                        <!-- Register Link -->
                        <div class="text-center mt-3">
                            <small class="text-dark">
                                Belum punya akun?
                                <a href="{{ route('register') }}" class="text-primary">Daftar di sini</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection