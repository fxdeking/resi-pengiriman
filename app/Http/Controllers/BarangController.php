<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'NamaBarang'=>'required|min:3|max:50',
            'BeratBarang'=>'required|min:1|max:5'
        ], ['NamaBarang.required'=>'Isi nama barang terlebih dahulu',
            'NamaBarang.min'=>'Minimal 3 karakter',
            'NamaBarang.max'=>'Jangan lebih dari 50 karakter',
            'BeratBarang.required'=>'Isi berat barang terlebih dahulu',
            'BeratBarang.min'=>'Minimal 1 karakter',
            'BeratBarang.max'=>'Jangan lebih dari 5 karakter']);

            Barang::create([
                'NamaBarang' => $request->get('NamaBarang'),
                'BeratBarang' => $request->get('BeratBarang')
              ]);

            return redirect()->route('bar')->with('message', 'Barang berhasil disimpan'); 
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
    public function edit($id)
    {
        $barang = Barang::find($id);
        return view ('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'NamaBarang'=>'required|min:3|max:50',
            'BeratBarang'=>'required|min:1|max:5'
        ], ['NamaBarang.required'=>'Isi nama barang terlebih dahulu',
            'NamaBarang.min'=>'Minimal 3 karakter',
            'NamaBarang.max'=>'Jangan lebih dari 50 karakter',
            'BeratBarang.required'=>'Isi berat barang terlebih dahulu',
            'BeratBarang.min'=>'Minimal 1 karakter',
            'BeratBarang.max'=>'Jangan lebih dari 5 karakter']);
            
            Barang::find($id)->update([
                'NamaBarang' => $request->get('NamaBarang'),
                'BeratBarang' => $request->get('BeratBarang')
              ]);

            return redirect()->route('bar')->with('message', 'Barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect()->route('bar')->with('message', 'Barang berhasil dihapus');
    }
}
