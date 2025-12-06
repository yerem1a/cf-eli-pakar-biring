<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Redirect ke diagnosa setelah login
    protected $redirectTo = RouteServiceProvider::HOME;

    // Field login pakai username
    public function username()
    {
        return 'username';
    }

    // Handle logout
    public function logout(Request $request)
    {
        // Logout user
        Auth::logout();
        
        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // Redirect ke login dengan pesan
        return redirect()->route('login')->with('success', 'Anda telah berhasil logout.');
    }

    // Custom validation untuk login
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
}