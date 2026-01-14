<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Support\Facades\DB; // <--- Tambahkan baris ini

class BarangKeluarController extends Controller
{
    public function index()
    {
        // Mengambil data dengan relasi barang agar tidak terjadi N+1 query
        $data = BarangKeluar::with('barang')->latest()->paginate(10);
        return view('admin.barang_keluar.index', compact('data'));
    }

    public function tambah()
    {
        $barang = Barang::all();
        return view('admin.barang_keluar.tambah', compact('barang'));
    }

    public function simpan(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'jumlah'    => 'required|integer|min:1',
            'tgl_keluar'=> 'required|date',
        ]);

        $barang = Barang::find($request->barang_id);

        // 2. Cek apakah stok cukup
        if ($barang->stok < $request->jumlah) {
            notify()->error('Stok tidak mencukupi! Stok saat ini: ' . $barang->stok);
            return back()->withInput();
        }

        // 3. Gunakan Database Transaction agar data konsisten
        DB::transaction(function () use ($request, $barang) {
            // Simpan data ke tabel barang_keluar
            BarangKeluar::create($request->all());

            // Kurangi stok di tabel barang
            $barang->stok -= $request->jumlah;
            $barang->save();
        });

        // 4. Gunakan notify() agar sama dengan AdminController
        notify()->success('Data Barang Keluar Berhasil Disimpan');
        return redirect('/admin/barang-keluar');
    }
}