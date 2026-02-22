<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * MENAMPILKAN HALAMAN DATA BUKU
     */
    public function index()
    {
        $buku = Buku::with('kategoriBuku')->get();
        $kategori = KategoriBuku::all(); 
    return view('admin.data_buku.index', compact('buku', 'kategori'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * VALIDASI CREATE BUKU
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_penerbit' => 'required|date',
            'stok' => 'required|numeric',
            'deskripsi' => 'required'
        ]);

        Buku::create($request->all());
        return back()->with('success', 'Buku berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        //
    }

    /**
     * UPDATE/EDIT BUKU
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'penerbit' => 'required',
            'tahun_penerbit' => 'required|date',
            'stok' => 'required|numeric',
            'deskripsi' => 'required'
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());
        return back()->with('success', "Buku berhasil diperbarui");
    }

    /**
     *  MENGHAPUS BUKU SECARA PERMANEN
     */
    public function destroy($id)
    {
        Buku::findOrFail($id)->delete();
        return back()->with('success', 'Buku berhasil dihapus');
    }
}
