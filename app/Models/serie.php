<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class serie extends Model
{
    use HasFactory;

    protected $fillable = ['id_buku','chapter','isi','status'];

    public function buku() 
    {
        return $this->belongsTo(buku::class, 'id_buku', 'id');
    }
}
