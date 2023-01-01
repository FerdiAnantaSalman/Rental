@extends('layout')

@section('content')

<div class="card mb-4">
    <div class="card-header"><i class="fas fa-table mr-1"></i>Data Sopir</div>
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
                        <th>Foto</th>
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
                    @foreach($sopirs as $sopir)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td><img width="150px" align="center" src="{{ url('/data_file/',$sopir->gambar) }}"></td>
                        <td>{{ $sopir->kd_sopir}}</td>
                        <td>{{ $sopir->nm_sopir}}</td>
                        <td>{{ $sopir->nohp}}</td>
                        <td>{{ $sopir->gender}}</td>
                        <td>{{ $sopir->alamat}}</td>
                        <td>{{ $sopir->ket}}</td>
                        <td>
                            <form action="{{ route('sopir.destroy', $sopir->id); }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" href="{{ route('sopir.edit', $sopir->id); }}">Edit</a>
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