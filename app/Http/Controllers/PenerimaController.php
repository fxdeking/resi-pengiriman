<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerima;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penerimas = Penerima::all();
        return view('penerima.index', compact('penerimas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penerima.create');
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
            'NamaPenerima'=>'required|min:3|max:50',
            'AlamatPenerima'=>'required|min:3'
        ], ['NamaPenerima.required'=>'Isi nama penerima terlebih dahulu',
            'NamaPenerima.min'=>'Minimal 3 karakter',
            'NamaPenerima.max'=>'Jangan lebih dari 50 karakter',
            'AlamatPenerima.required'=>'Isi alamat penerima terlebih dahulu',
            'AlamatPenerima.min'=>'Minimal 3 karakter']);

            Penerima::create([
                'NamaPenerima' => $request->get('NamaPenerima'),
                'AlamatPenerima' => $request->get('AlamatPenerima')
              ]);

            return redirect()->route('pen')->with('message', 'Penerima berhasil disimpan'); 
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
        $penerima = Penerima::find($id);
        return view ('penerima.edit', compact('penerima'));
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
            'NamaPenerima'=>'required|min:3|max:50',
            'AlamatPenerima'=>'required|min:3'
        ], ['NamaPenerima.required'=>'Isi nama penerima terlebih dahulu',
            'NamaPenerima.min'=>'Minimal 3 karakter',
            'NamaPenerima.max'=>'Jangan lebih dari 50 karakter',
            'AlamatPenerima.required'=>'Isi alamat penerima terlebih dahulu',
            'AlamatPenerima.min'=>'Minimal 3 karakter']);

            Penerima::find($id)->update([
                'NamaPenerima' => $request->get('NamaPenerima'),
                'AlamatPenerima' => $request->get('AlamatPenerima')
              ]);

            return redirect()->route('pen')->with('message', 'Penerima berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penerima = Penerima::find($id);
        $penerima->delete();
        return redirect()->route('pen')->with('message', 'Penerima berhasil dihapus');
    }
}
