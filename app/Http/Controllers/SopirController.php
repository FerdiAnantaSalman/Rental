<?php

namespace App\Http\Controllers;

use App\Models\Sopir;
use Illuminate\Http\Request;

class SopirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sopirs =  Sopir::latest()->paginate(20);
        return view('sopir.index', compact('sopirs'))->with('i', (request()->input('page', 1) - 1) * 20);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sopir.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_sopir' => 'required',
            'nm_sopir' => 'required',
            'nohp' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'ket' => 'required',
            'gambar' => 'required'
        ]);

        $file =  $request->file('gambar');

        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        Sopir::create([
            'kd_sopir' => $request->kd_sopir,
            'nm_sopir' => $request->nm_sopir,
            'nohp' => $request->nohp,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
            'ket' => $request->ket,
            'gambar' => $nama_file
        ]);
        return redirect()->route('sopir.index')
            ->with('succsess', 'Sopir created succsessfully.');
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
    public function edit(Sopir $sopir)
    {
        return view('sopir.edit', compact('sopir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sopir $sopir)
    {
        $request->validate([
            'kd_sopir' => 'required',
            'nm_sopir' => 'required',
            'nohp' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'ket' => 'required',
        ]);

        $sopir->update($request->all());
        return redirect()->route('sopir.index')
            ->with('succsess', 'Sopir updated succsessfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sopir $sopir)
    {
        $sopir->delete();
        return redirect()->route('sopir.index')
            ->with('success', 'Data berhasil dihapus');
    }
}