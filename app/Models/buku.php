<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable = ['cover','judul','sinopsis','id_kategori'];

    public function kategori() 
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }

    public function penulis()
    {
        return $this->belongsTo(user::class, 'id_penulis', 'id');
    }
}
