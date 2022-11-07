@extends('layout')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Produk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Produk/Barang</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header"><i class="fas fa-edit mr-1"></i>Data Barang/Produk</div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div>
                        <h2>Update Product</h2>
                    </div>
                    <div>
                        <a class="btn btn-primary" href="{{ route('produk.index') }}">Back</a>
                    </div>
                </div>
            </div>

            @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops !</strong> There were some problems with your input. <br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama Produk:</strong>
                            <input type="text" name="nm_produk" class="form-control"
                                value="{{ $produk->nm_produk }}"></input>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Harga Produk:</strong>
                            <input type="text" name="harga" class="form-control" value="{{ $produk->harga }}"></input>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Stok Produk:</strong>
                            <input type="text" name="stok" class="form-control" value="{{ $produk->stok }}"></input>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Keterangan:</strong>
                            <textarea class="form-control" name="ket">{{ $produk->ket }}</textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Foto Produk:</strong>
                            <input type="file" name="gambar">></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
            @endsection