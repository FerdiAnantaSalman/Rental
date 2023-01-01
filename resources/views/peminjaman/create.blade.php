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
    <strong>Whoops !</strong> There were some problems with your input. <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('peminjaman.store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Referensi:</strong>
                <input type="text" name="no_ref" class="form-control" placeholder="Masukkan No. Referensi"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Customer:</strong>
                <input type="text" name="no_cus" class="form-control" placeholder="Masukkan Nomor Customer"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Customer:</strong>
                <input type="text" name="nm_cus" class="form-control" placeholder="Masukkan Nama Customer"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Produk:</strong>
                <select class="form-control" name="produk" id="produk" onchange="changeValue(this.value)">
                    <option>Pilih Produk</option>

                    <?php 
                    $jsArray = "var prdName = new Array();\n";
                    ?>

                    @foreach ($produks as $produk)
                    <option value="{{ $produk->id }}">{{ $produk->nm_produk }}</option>

                    <?php 
                    $jsArray .= "prdName['".$produk->id."'] = {
                        harga:'".addslashes($produk->harga)."',
                        stok:'".addslashes($produk->stok)."'};\n";
                    ?>

                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Harga Sewa Kendaraan:</strong>
                <input type="text" name="harga" class="form-control" id="harga" readonly></input>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Stok Kendaraan:</strong>
                <input type="text" name="stok" class="form-control" id="stok" readonly></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Sopir:</strong>
                <select class="form-control" name="sopir">
                    <option>Pilih Sopir</option>
                    @foreach ($sopirs as $sopir)
                    <option value="{{ $sopir->id }}">{{ $sopir->nm_sopir }}</option>
                    @endforeach
                </select>
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah:</strong>
                <input type="text" name="jumlah" class="form-control" placeholder="Masukkan Jumlah Pinjam"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Lama Pinjam:</strong>
                <input type="text" name="lama_pinjam" class="form-control" placeholder="Masukkan Lama Pinjam"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Pinjam:</strong>
                <input type="date" name="tgl_pinjam" class="form-control"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Kembali:</strong>
                <input type="date" name="tgl_kembali" class="form-control"></input>
            </div>
        <div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
            <a class="btn btn-primary" href="{{ route('peminjaman.index') }}">Back</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
</form>
<script type="text/javascript">
    <?php echo $jsArray; ?>
    function changeValue(x){
    document.getElementById('harga').value = prdName[x].harga;
    document.getElementById('stok').value = prdName[x].stok;
    }
</script>
@endsection