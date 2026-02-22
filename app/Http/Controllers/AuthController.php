<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku; 
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * MENAMPILKAN HALAMAN LOGIN
     */
    public function showLogin()
    {
        return view('login.login');
    }

    /**
     * VALIDASI HALAMAN LOGIN
     */

    public function storeLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }
            return redirect('/user/katalog-buku');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**
     * MENAMPILKAN HALAMAN DAFTAR
     */
    public function showDaftar()
    {
        return view('login.daftar');
    }

    /**
     * VALIDASI HALAMAN DAFTAR
     */
    public function storeDaftar(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email|unique:users,email',
            'name'     => 'required',
            'password' => 'required|min:6|confirmed', 
            'nis'      => 'required|unique:users,nis',
            'no_telp'  => 'required',
            'jurusan'  => 'required|not_in:Pilih Jurusan', 
        ], [
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

    /**
     * MENAMPILKAN HALAMAN DATA ANGGOTA ADMIN
     */ 

    public function showAnggota()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.data_anggota.index', compact('users'));
    }

    /**
     * EDIT/UPDATE HALAMAN DATA ANGGOTA ADMIN
     */

    public function updateAnggota(Request $request, $id)
    {
    $request->validate([
        'email'   => 'required|email|unique:users,email,'.$id.',id_user',
        'name'    => 'required',
        'nis'     => 'required|unique:users,nis,'.$id.',id_user',
        'no_telp' => 'required',
        'jurusan' => 'required', 
    ]);

    $user = User::findOrFail($id);
    $user->update($request->all());

    return back()->with('success', "Anggota " . $user->name . " berhasil diperbarui");
    }

    /**
     * MENGHAPUS HALAMAN DATA ANGGOTA ADMIN
     */
    public function destroyAnggota($id)
    {
        User::findOrFail($id)->delete();
        return back()->with('success', 'User berhasil dihapus');
    }

    /**
     * MENAMPILKAN HALAMAN DASHBOARD ADMIN
     */
    public function showDashboard(){
    $totalBuku = Buku::count();
    $totalAnggota = User::where('role', 'user')->count();
    $bukuDipinjam = Peminjaman::where('status', 'dipinjam')->count();

    return view('admin.dashboard', compact('totalBuku', 'totalAnggota', 'bukuDipinjam'));
    }

    /**
     * MENAMPILKAN HALAMAN LOGOUT
     */
    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

}