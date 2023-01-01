@extends('layout')
@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Data Peminjaman</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Peminjaman</li>
    </ol>
                        
<div class="card mb-4">
    <div class="card-header"><i class="fas fa-edit mr-1"></i>Data Peminjaman</div>
    <div class="card-body">
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('peminjaman.store') }}" method="POST">
    {{ csrf_field() }}
  
     <div class="form-row">
        <div class="col-md-12">
            <div class="form-group">
                <label>Nomor Referensi:</label>
                <input type="text" name="no_ref" class="form-control" placeholder="Masukkan Nomor Referensi">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Nomor Customer:</label>
                <input type="text" name="no_cus" class="form-control" placeholder="Masukkan Nomor Customer">
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama Customer:</strong>
                <input type="text" class="form-control" name="nm_cus" placeholder="Masukkan Nama Customer"></input>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Produk:</strong>
                <select class="form-control" name="produk">
                    <option>~Pilih Produk~</option>
                     @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}">{{ $produk->nm_produk }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Nama Sopir:</strong>
                <select class="form-control" name="sopir">
                    <option>~Pilih Sopir~</option>
                     @foreach ($sopirs as $sopir)
                    <option value="{{ $sopir->id }}">{{ $sopir->nm_sopir }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Jumlah:</strong>
                <input type="text" class="form-control" name="jumlah" placeholder="Masukkan Jumlah Pinjam"></input>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Lama Pinjam:</strong>
                <input type="text" class="form-control" name="lama_pinjam" placeholder="Masukkan Lama Pinjam"></input>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Pinjam:</strong>
                <input type="date" class="form-control" name="tgl_pinjam"></input>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <strong>Tanggal Kembali:</strong>
                <input type="date" class="form-control" name="tgl_kembali"></input>
            </div>
        </div>
        <div class="col-md-12 text-center mt-3">
        <button type="submit" class="btn btn-success">Submit</button> 
        <a class="btn btn-primary" href="{{ route('sopir.index') }}"> Back</a>
        </div>
    </div>
</form>
@endsection