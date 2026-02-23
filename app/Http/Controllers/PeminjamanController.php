<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * MENAMPILKAN HALAMAN KATALOG BUKU
     */
    public function indexUser()
    {
        $bukus = Buku::with('kategoriBuku')->get();
        $kategori = KategoriBuku::all();  
        return view('user.katalog_buku', compact('bukus', 'kategori'));
    }

    /**
     * VALIDASI/LOGIKA PEMINJAMAN BUKU
     */
    public function store(Request $request)
    {
    $user_id = Auth::id();
    $kode_buku = $request->kode_buku;

    $buku = Buku::findOrFail($kode_buku);

    // 1. Cek apakah user sudah meminjam buku yang sama dan belum dikembalikan
    $sudahPinjam = Peminjaman::where('user_id', $user_id)
        ->where('kode_buku', $kode_buku)
        ->where('status', 'dipinjam')
        ->exists();

    if ($sudahPinjam) {
        return back()->with('success', 'Kamu masih meminjam buku ini. Kembalikan dulu sebelum meminjam lagi!');
    }

    // 2. Cek stok buku
    if ($buku->stok <= 0) {
        return back()->with('success', 'Stok buku habis!');
    }

    // 3. Buat data peminjaman jika lolos validasi
    Peminjaman::create([
        'user_id' => $user_id, 
        'kode_buku' => $kode_buku,
        'tgl_pinjam' => now(),
        'status' => 'dipinjam'
    ]);

    // 4. Kurangi stok buku
    $buku->decrement('stok');

    return back()->with('success', 'Buku berhasil dipinjam!');
}

/**
     * VALIDASI/LOGIKA KEMBALIKAN BUKU
     */
    public function kembaliBuku($id)
    {
        $pinjam = Peminjaman::findOrFail($id);
        
        if ($pinjam->status == 'dipinjam') {
            // 1. Update status dan tgl kembali
            $pinjam->update([
                'status' => 'dikembalikan',
                'tgl_kembali' => now()
            ]);

            // 2. Tambah kembali stok buku
            Buku::where('kode_buku', $pinjam->kode_buku)->increment('stok');
            return back()->with('success', 'Buku berhasil dikembalikan!');
        }

        return back()->with('success', 'Buku telah dikembalikan!');
    }

    /**
     * MENAMPILKAN HALAMAN BUKU SAYA USER
     */
    public function bukuSaya()
    {
        $peminjamans = Peminjaman::with('buku')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.buku_saya', compact('peminjamans'));
    }

    /**
     * MENAMPILKAN HALAMAN PEMINJAMAN ADMIN
     */
    public function indexAdmin()
    {
        $peminjamans = Peminjaman::withTrashed()
            ->with(['user', 'buku.kategoriBuku'])
            ->latest()
            ->get();
            
        return view('admin.peminjaman.index', compact('peminjamans'));
    }

    /**
     * MENGHAPUS SECARA PERMAENEN PEMINJAMAN DIHALAMAN TRANSAKSI ADMIN
     */
    public function destroy($id)
    {
        $peminjaman = Peminjaman::withTrashed()->findOrFail($id);
        
        // Kembalikan stok
        if($peminjaman->status == 'dipinjam'){
            $peminjaman->buku->increment('stok');
        }

        $peminjaman->forceDelete();

        return back()->with('success', 'Data transaksi berhasil dihapus permanen oleh Admin!');
    }

    /**
     * MENGHAPUS PEMINJAMAN BUKU SECARA HIDDEN DIHALAMAN BUKU SAYA USER 
     */
    public function destroyUser($id)
    {
        $peminjaman = Peminjaman::where('id_pinjam', $id)
                            ->where('user_id', Auth::id())
                            ->firstOrFail();

        // Ini hanya akan mengisi kolom deleted_at
        $peminjaman->delete();

        return back()->with('success', 'Riwayat peminjaman berhasil dihapus dari daftar Anda.');
    }
}
