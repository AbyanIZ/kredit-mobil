<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi form login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek role admin
            if (auth()->user()->role !== 'admin') {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Akses ditolak, hanya admin yang bisa login.'
                ])->withInput();
            }

            return redirect()->intended(route('dashboard'));
        }

        // Jika gagal login
        return back()->withErrors([
            'email' => 'Email atau password salah.'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
