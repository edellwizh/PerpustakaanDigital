<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function indexUser()
    {
        $bukus = Buku::with('kategoriBuku')->get();
        $kategori = KategoriBuku::all();  
        return view('user.katalog_buku', compact('bukus', 'kategori'));
    }
 
    public function store(Request $request)
{
    $id_user = Auth::id();
    $id_buku = $request->id_buku;

    $buku = Buku::findOrFail($id_buku);

    // 1. Cek apakah user sudah meminjam buku yang sama dan belum dikembalikan
    $sudahPinjam = Peminjaman::where('id_user', $id_user)
        ->where('id_buku', $id_buku)
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
        'id_user' => $id_user, 
        'id_buku' => $id_buku,
        'tgl_pinjam' => now(),
        'status' => 'dipinjam'
    ]);

    // 4. Kurangi stok buku
    $buku->decrement('stok');

    return back()->with('success', 'Buku berhasil dipinjam!');
}

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
            Buku::where('id_buku', $pinjam->id_buku)->increment('stok');
            return back()->with('success', 'Buku berhasil dikembalikan!');
        }

        return back()->with('success', 'Buku telah dikembalikan!');
    }

    public function bukuSaya()
    {
        // Karena menggunakan SoftDeletes di Model, data yang di-delete oleh user
        // otomatis tidak akan tertarik di sini.
        $peminjamans = Peminjaman::with('buku')
            ->where('id_user', Auth::id())
            ->latest()
            ->get();

        return view('user.buku_saya', compact('peminjamans'));
    }

    public function indexAdmin()
    {
        // Menggunakan withTrashed() agar data yang dihapus user tetap muncul di Admin
        $peminjamans = Peminjaman::withTrashed()
            ->with(['user', 'buku'])
            ->latest()
            ->get();
            
        return view('admin.peminjaman.index', compact('peminjamans'));
    }


    public function destroy($id)
    {
        $peminjaman = Peminjaman::withTrashed()->findOrFail($id);
        
        // Kembalikan stok jika admin menghapus paksa saat buku masih dipinjam
        if($peminjaman->status == 'dipinjam'){
            $peminjaman->buku->increment('stok');
        }

        // Admin melakukan force delete agar benar-benar hilang dari DB
        $peminjaman->forceDelete();

        return back()->with('success', 'Data transaksi berhasil dihapus permanen oleh Admin!');
    }

    public function destroyUser($id)
    {
        $peminjaman = Peminjaman::where('id_pinjam', $id)
                            ->where('id_user', Auth::id())
                            ->firstOrFail();

        // Ini hanya akan mengisi kolom deleted_at (data tetap ada di DB)
        $peminjaman->delete();

        return back()->with('success', 'Riwayat peminjaman berhasil dihapus dari daftar Anda.');
    }
}
