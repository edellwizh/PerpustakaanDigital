<?php

namespace App\Http\Controllers;

use App\Models\KategoriBuku;
use Illuminate\Http\Request;

class KategoriBukuController extends Controller
{
    /**
     * MENAMPILKAN HALAMAN KATEGORI BUKU 
     */
    public function index()
    {
        $kategori = KategoriBuku::all();
        return view('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * VALIDASI KATEGORI BUKU
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable'
        ]);

        KategoriBuku::create($request->all());
        return back()->with('success', 'Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoriBuku $kategoriBuku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoriBuku $kategoriBuku)
    {
        //
    }

    /**
     * EDIT/UPDATE KATEGORI BUKU
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'nullable'
        ]);

        $kategori = KategoriBuku::findOrFail($id);
        $kategori->update($request->all());

        return back()->with('success', 'Kategori berhasil diperbarui');
    }

    /**
     * MENGHAPUS SECARA PERMANEN KATEGORI BUKU
     */
    public function destroy($id)
    {
        KategoriBuku::findOrFail($id)->delete();
        return back()->with('success', 'Kategori berhasil dihapus');
    }
}
