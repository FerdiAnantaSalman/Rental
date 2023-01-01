<?php
namespace App\Http\Controllers;
use App\Models\Peminjaman;
use App\Models\Produk;
use App\Models\Sopir;
use Illuminate\Http\Request;
use DB;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = DB::table('peminjaman')
                       ->join('produk', 'produk.id','=','peminjaman.produk')
                       ->join('sopir','sopir.id','=','peminjaman.sopir')
                       ->get();
        return view('pembayaran.index',compact('pembayarans'))->with('i');
    }
    
    public function create()
    {
        $produks = Produk::all();
        $sopirs = Sopir::all();
        return view('peminjaman.create', compact('produks','sopirs'));
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
                        ->with('success','Data berhasil disimpan.');
    }
    
    public function show($id)
    {
        // 
    }

    public function edit(Peminjaman $peminjaman)
    {
        $produks = Produk::all();
        $sopirs = Sopir::all();
        return view('peminjaman.edit', compact('peminjaman','produks','sopirs'));
    }
 
    public function update(Request $request, Peminjaman $peminjaman)
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
      
        $peminjaman->update($request->all());
        return redirect()->route('peminjaman.index')
                        ->with('success','Data berhasil dirubah');
    }
    
    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return redirect()->route('peminjaman.index')
                        ->with('success','Data berhasil dihapus');
    }
}


