<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User; // Model user
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use Illuminate\Support\Facades\Auth; // Untuk autentikasi

class AuthController extends \App\Http\Controllers\Controllers

{
    // Menangani form register
    public function register(Request $request)
    {
        // Validasi data input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Simpan pengguna baru
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Hash password sebelum disimpan
        ]);

        // Login pengguna setelah berhasil register
        Auth::login($user);

        // Redirect ke halaman home setelah sukses register
        return redirect()->route('home')->with('success', 'Pendaftaran berhasil!');
    }

    // Menangani form login
    public function login(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba login dengan kredensial yang diberikan
        if (Auth::attempt($credentials)) {
            // Jika berhasil login
            $request->session()->regenerate(); // Regenerasi sesi
            return redirect()->route('home')->with('success', 'Login berhasil!');
        }

        // Jika login gagal, kembalikan ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Menangani logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home')->with('success', 'Logout berhasil!');
    }

    public function showLoginForm()
{
    return view('login');
}

}
