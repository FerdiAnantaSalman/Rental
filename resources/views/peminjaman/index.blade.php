@extends('layout')

@section('content')

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Peminjaman</div>
    <div class="card-body">
        <div class="table-responsive">
            @if ($message = Session::get('success'))
            <div class="alret alret-success">
                <p>{{$message}}</p>
            </div>
            @endif
            <a class="btn btn-success" href="{{ route('peminjaman.create') }}">Tambah Peminjaman</a><br><br>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Ref</th>
                        <th>Nama Customer</th>
                        <th>Kendaraan</th>
                        <th>Sopir</th>
                        <th>Lama Pinjam</th>
                        <th>Jumlah</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
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
                    @foreach($peminjamans as $peminjaman)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $peminjaman->no_ref }}</td>
                        <td>{{ $peminjaman->nm_cus }}</td>
                        <td>{{ $peminjaman->nm_produk }}</td>
                        <td>{{ $peminjaman->nm_sopir}}</td>
                        <td>{{ $peminjaman->lama_pinjam}} Hari</td>
                        <td>{{ $peminjaman->jumlah}}</td>
                        <td>{{ $peminjaman->tgl_pinjam}}</td>
                        <td>{{ $peminjaman->tgl_kembali}}</td>
                        <td>
                            <form action="{{ route('peminjaman.destroy', $peminjaman->id); }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning"
                                    href="{{ route('peminjaman.edit', $peminjaman->id); }}">Edit</a>
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