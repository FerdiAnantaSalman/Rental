@extends('layout')

@section('content')

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Produk</div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($message = Session::get('success'))
            <div class="alret alret-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <a class="btn btn-success" href="{{ route('produk.create') }}">Create New Product</a><br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga Produk</th>
                        <th>Stok Produk</th>
                        <th>Keterangan</th>
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
                    @foreach($produks as $produk)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $produk->nm_produk}}</td>
                        <td>{{ $produk->harga}}</td>
                        <td>{{ $produk->stok}}</td>
                        <td>{{ $produk->ket}}</td>
                        <td>
                            <form action="{{ route('produk.edit', $produk->id); }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" href="{{ route('produk.edit', $produk->id); }}">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="javascript: return confirm('Apakah anda yakin ingin menghapus data ini ?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection