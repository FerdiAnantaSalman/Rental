<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks =  Produk::latest()->paginate(20);
        return view('produk.index', compact('produks'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        return view('produk.create');
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

        Produk::create([
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
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nm_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'ket' => 'required',
        ]);

        $produk->update($request->all());
        return redirect()->route('produk.index')
            ->with('succsess', 'Product updated succsessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index')
            ->with('success', 'Data berhasil dihapus');
    }
}