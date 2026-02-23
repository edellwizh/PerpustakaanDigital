<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use SoftDeletes;
    protected $table = 'peminjamans';
    protected $primaryKey = 'id_pinjam';
    protected $fillable = [
        'user_id',
        'kode_buku',
        'tgl_pinjam',
        'tgl_kembali',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function buku(){
        return $this->belongsTo(Buku::class, 'kode_buku');
    }
}
