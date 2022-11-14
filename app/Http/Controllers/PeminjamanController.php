<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Produk;
use App\Models\Sopir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjamans = DB::table('peminjaman')
            ->join('produk', 'produk.id', '=', 'peminjaman.produk')
            ->join('sopir', 'sopir.id', '=', 'peminjaman.sopir')
            ->get();
        return view('peminjaman.index', compact('peminjamans'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    public function create()
    {
        $produks = Produk::all();
        $sopirs = Sopir::all();
        return view('peminjaman.create', compact('produks', 'sopirs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_ref' => 'required',
            'no_cus' => 'required',
            'nm_cus' => 'required',
            'produk' => 'required',
            'sopir' => 'required',
            'jumlah' => 'required',
            'lama_pinjam' => 'required',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
        ]);

        Peminjaman::create($request->all());

        return redirect()->route('peminjaman.index')
            ->with('succsess', 'Data created succsessfully.');
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