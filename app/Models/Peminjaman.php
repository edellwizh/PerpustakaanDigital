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
        'id_user',
        'id_buku',
        'tgl_pinjam',
        'tgl_kembali',
        'status'
    ];
    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function buku(){
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}
