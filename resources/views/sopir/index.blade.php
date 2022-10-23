@extends('layout')

@section('content')

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($message = Session::get('success'))
            <div class="alret alret-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <a class="btn btn-success" href="{{ route('sopir.create') }}">Create New Sopir</a><br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Sopir</th>
                        <th>Nama Sopir</th>
                        <th>No HP</th>
                        <th>Gender</th>
                        <th>Alamat</th>
                        <th>Ket</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <!-- <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Stok Produk</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </tfoot> -->
                <tbody>
                    @foreach($sopir as $data)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $data->kd_sopir}}</td>
                        <td>{{ $data->nm_sopir}}</td>
                        <td>{{ $data->nohp}}</td>
                        <td>{{ $data->gender}}</td>
                        <td>{{ $data->alamat}}</td>
                        <td>{{ $data->ket}}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection