<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'bukus';
    protected $primaryKey = 'kode_buku';

    protected $fillable = [
        'id_kategori',
        'judul',
        'penerbit',
        'pengarang',
        'tahun_penerbit',
        'stok',
        'deskripsi'
    ];

    public function kategoriBuku(){
        return $this->belongsTo(KategoriBuku::class, 'id_kategori');
    }
}
