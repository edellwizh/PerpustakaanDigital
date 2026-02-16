<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriBuku extends Model
{
    protected $table = 'kategori_bukus';
    protected $primaryKey = 'id_kategori';
    protected $fillable = [
        'nama_kategori',
        'deskripsi'];
}
