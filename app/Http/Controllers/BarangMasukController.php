<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Support\Facades\DB;

class BarangMasukController extends Controller {
    public function index() {
        $data = BarangMasuk::with('barang')->latest()->paginate(10);
        return view('admin.barang_masuk.index', compact('data'));
    }

    public function tambah() {
        $barang = Barang::all();
        return view('admin.barang_masuk.tambah', compact('barang'));
    }

    public function simpan(Request $request) {
        $request->validate([
            'barang_id' => 'required',
            'jumlah' => 'required|integer|min:1',
            'tgl_masuk' => 'required|date',
        ]);

        DB::transaction(function () use ($request) {
            // 1. Catat riwayat masuk
            BarangMasuk::create($request->all());

            // 2. Tambah stok barang
            $barang = Barang::find($request->barang_id);
            $barang->stok += $request->jumlah; // Stok bertambah
            $barang->save();
        });

        notify()->success('Stok Barang Berhasil Ditambah');
        return redirect('/admin/barang-masuk');
    }
}