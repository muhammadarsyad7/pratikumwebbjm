@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-6">
        <h1 class="h3 mb-4 text-gray-800">Barang Keluar</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="/admin/barang-keluar/tambah" class="btn btn-primary btn-circle btn-lg">
            <i class="fa fa-plus"></i>
        </a>
    </div>
</div>

<div class="card shadow">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA BARANG</th>
                        <th>JUMLAH KELUAR</th>
                        <th>TANGGAL</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->barang->nama }}</td>
                        <td>{{ $item->jumlah }}</td>
                        <td>{{ $item->tgl_keluar }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>
@endsection