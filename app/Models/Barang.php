<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model {
    use HasFactory;
    protected $table = 'barang';
    protected $fillable = [
        'nama_barang',
        'harga_barang',
        'jumlah_barang',
        'foto_barang',
        'kategori_id'
    ];

    public function kategori() {
        return $this->belongsTo('App\Models\Kategori', 'kategori_id', 'id');
    }
}
