@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-6"><h1>Data Barang Masuk</h1></div>
    <div class="col-md-6 text-right">
        <a href="/admin/barang-masuk/tambah" class="btn btn-primary btn-circle btn-lg"><i class="fa fa-plus"></i></a>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>TANGGAL</th>
                    <th>NAMA BARANG</th>
                    <th>JUMLAH MASUK</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->tgl_masuk }}</td>
                    <td>{{ $item->barang->nama }}</td>
                    <td><span class="badge badge-success">+ {{ $item->jumlah }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection