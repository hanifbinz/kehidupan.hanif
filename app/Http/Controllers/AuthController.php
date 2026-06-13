<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman form login
    public function formLogin()
    {
        return view('login');
    }

    // Memproses data yang diinput
    public function prosesLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Jika email dan password cocok dengan database
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard'); // Bawa ke dashboard
        }

        // Jika salah, kembalikan dengan pesan error
        return back()->with('error', 'Email atau password salah, coba lagi.');
    }

    // Keluar (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/'); // Kembalikan ke halaman depan
    }
}