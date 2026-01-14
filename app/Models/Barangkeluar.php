<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'barang_keluar'; // Pastikan nama tabel di DB sama
    protected $fillable = ['barang_id', 'jumlah', 'tgl_keluar'];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}