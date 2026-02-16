<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLogin()
    {
        return view('login.login');
    }

    public function storeLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Logika pengalihan berdasarkan Role
            if (Auth::user()->role === 'admin') {
                return view('admin.dashboard');
            }
            return view('user.katalog_buku');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * Display the specified resource.
     */
    public function showDaftar()
    {
        return view('login.daftar');
    }

    public function storeDaftar(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email|unique:users,email',
            'name'     => 'required',
            'password' => 'required|min:6|confirmed', // 'confirmed' akan mencari input bernama password_confirmation
            'nis'      => 'required|unique:users,nis',
            'no_telp'  => 'required',
            'jurusan'  => 'required|not_in:Pilih Jurusan', // Memastikan user tidak memilih opsi default
        ], [
            // Custom pesan error (Opsional)
            'password.confirmed' => 'Konfirmasi password Anda tidak cocok.',
            'jurusan.required'   => 'Silakan pilih jurusan Anda.',
        ]);

        // Enkripsi password
        $validated['password'] = Hash::make($request->password);
        $validated['role']     = 'user';

        // Simpan ke database
        User::create($validated);

        return back()->with('success', 'Pendaftaran berhasil. Silakan login.');
    }
}