<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans =  Peminjaman::latest()->paginate(20);
        return view('peminjaman.index', compact('peminjamans'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'ket' => 'required',
            'gambar' => 'required',
        ]);

        $file =  $request->file('gambar');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        Peminjaman::create([
            'nm_produk' => $request->nm_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'ket' => $request->ket,
            'gambar' => $nama_file,
        ]);

        return redirect()->route('produk.index')
            ->with('succsess', 'Product created succsessfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.edit', compact('peminjaman'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $request->validate([
            'nm_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'ket' => 'required',
        ]);

        $peminjaman->update($request->all());
        return redirect()->route('produk.index')
            ->with('succsess', 'Product updated succsessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        // File::delete('data_file/', $produk->gambar);

        $peminjaman->delete();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dihapus');
    }
}