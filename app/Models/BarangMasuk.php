<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'barang_masuk';
    protected $fillable = ['barang_id', 'jumlah', 'tgl_masuk'];

    // TAMBAHKAN BARIS INI:
    public $timestamps = false; 

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}