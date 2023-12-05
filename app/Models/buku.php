<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku extends Model
{
    use HasFactory;

    protected $fillable = ['cover', 'pdf', 'path', 'judul', 'sinopsis', 'id_kategori', 'id_penulis', 'status'];

    public function kategori() 
    {
        return $this->belongsTo(kategori::class, 'id_kategori', 'id');
    }

    public function penulis()
    {
        return $this->belongsTo(user::class, 'id_penulis', 'id');
    }
}
