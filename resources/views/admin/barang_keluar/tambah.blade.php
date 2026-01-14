@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card shadow">
            <div class="card-header">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Barang Keluar</h6>
            </div>
            <div class="card-body">
                <form method="post" action="/admin/barang-keluar/simpan">
                    @csrf
                    <div class="form-group">
                        Pilih Barang
                        <select name="barang_id" class="form-control" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barang as $b)
                                <option value="{{ $b->id }}">{{ $b->kode }} - {{ $b->nama }} (Stok: {{ $b->stok }})</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        Jumlah Keluar
                        <input type="number" class="form-control" name="jumlah" required min="1">
                    </div>
                    <div class="form-group">
                        Tanggal Keluar
                        <input type="date" class="form-control" name="tgl_keluar" value="{{ date('Y-m-d') }}" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg"> <i class="fa fa-save"></i> SIMPAN</button>
                        <a href="/admin/barang-keluar" class="btn btn-secondary btn-lg">KEMBALI</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection