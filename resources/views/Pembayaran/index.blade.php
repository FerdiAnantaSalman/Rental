@extends('layout')
@section('content')

<div class="card mb-4">
<div class="card-header"><i class="fas fa-table mr-1"></i>Data Pembayaran Peminjaman Kendaraan</div>
<div class="card-body">
<div class="table-responsive">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr align="center">
        <th>No</th>
            <th>No. Ref</th>
            <th>Harga Kendaraan</th>
            <th>Harga Sopir</th>
            <th>Jumlah Pinjam</th>
            <th>Total Bayar</th>
            <th width="14%">Action</th>

    </tr>
</thead>

<tfoot>
    <tr align="center">
        <th>No</th>
            <th>No. Ref</th>
            <th>Harga Kendaraan</th>
            <th>Harga Sopir</th>
            <th>Jumlah Pinjam</th>
            <th>Total Bayar</th>
            <th width="14%">Action</th>
    </tr>
</tfoot>

        <tbody>
            @foreach ($pembayarans as $pembayaran)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $pembayaran->no_ref }}</td>
            <td>{{ $pembayaran->harga }}</td>
            <td>100000</td>
            <td>{{ $pembayaran->jumlah }}</td>
            <td>{{ $pembayaran->harga * $pembayaran->jumlah + 100000 }}</td>
            <td>
            <form action="{{ route('pembayaran.destroy',$pembayaran->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
            <a class="btn btn-warning" href="{{ route('pembayaran.edit',$pembayaran->id) }}">Ubah</a>
            <button type="submit" class="btn btn-danger" onclick="javascript: return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
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

