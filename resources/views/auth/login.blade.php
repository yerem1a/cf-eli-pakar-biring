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
                            <h5 class="fw-bold text-primary">Login to Your Account</h5>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label text-dark">Email Address</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
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
                                    Remember Me
                                </label>
                            </div>

                            <!-- Submit -->
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary px-4">
                                    Login
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none text-primary" href="{{ route('password.request') }}">
                                        Forgot Password?
                                    </a>
                                @endif
                            </div>
                        </form>

                        <!-- Register Link -->
                        <div class="text-center mt-3">
                            <small class="text-dark">
                                Don't have an account?
                                <a href="{{ route('register') }}" class="text-primary">Register here</a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection
