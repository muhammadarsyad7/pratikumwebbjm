@extends('layouts.master')
@section('content')
<div class="card shadow">
    <div class="card-header"><h6 class="m-0 font-weight-bold text-primary">Form Barang Masuk</h6></div>
    <div class="card-body">
        <form method="post" action="/admin/barang-masuk/simpan">
            @csrf
            <div class="form-group">
                <label>Pilih Barang</label>
                <select name="barang_id" class="form-control" required>
                    @foreach($barang as $b)
                        <option value="{{ $b->id }}">{{ $b->nama }} (Stok Sekarang: {{ $b->stok }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Jumlah Masuk</label>
                <input type="number" name="jumlah" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tgl_masuk" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">SIMPAN STOK</button>
        </form>
    </div>
</div>
@endsection