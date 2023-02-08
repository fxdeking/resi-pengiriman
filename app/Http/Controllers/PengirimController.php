<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengirim;

class PengirimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengirims = Pengirim::all();
        return view('pengirim.index', compact('pengirims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengirim.create');
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
            'NamaPengirim'=>'required|min:3|max:50',
            'NoTeleponPengirim'=>'required|min:3|max:15'
        ], ['NamaPengirim.required'=>'Isi nama pengirim terlebih dahulu',
            'NamaPengirim.min'=>'Minimal 3 karakter',
            'NamaPengirim.max'=>'Jangan lebih dari 50 karakter',
            'NoTeleponPengirim.required'=>'Isi nomor telepon pengirim terlebih dahulu',
            'NoTeleponPengirim.min'=>'Minimal 3 karakter',
            'NoTeleponPengirim'=>'Jangan lebih dari 15 karakter']);

            Pengirim::create([
                'NamaPengirim' => $request->get('NamaPengirim'),
                'NoTeleponPengirim' => $request->get('NoTeleponPengirim')
              ]);

            return redirect()->route('peng')->with('message', 'Pengirim berhasil disimpan'); 
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
        $pengirim = Pengirim::find($id);
        return view ('pengirim.edit', compact('pengirim'));
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
            'NamaPengirim'=>'required|min:3|max:50',
            'NoTeleponPengirim'=>'required|min:3|max:15'
        ], ['NamaPengirim.required'=>'Isi nama pengirim terlebih dahulu',
            'NamaPengirim.min'=>'Minimal 3 karakter',
            'NamaPengirim.max'=>'Jangan lebih dari 50 karakter',
            'NoTeleponPengirim.required'=>'Isi nomor telepon pengirim terlebih dahulu',
            'NoTeleponPengirim.min'=>'Minimal 3 karakter',
            'NoTeleponPengirim.max'=>'Jangan lebih dari 15 karakter']);

            Pengirim::find($id)->update([
                'NamaPengirim' => $request->get('NamaPengirim'),
                'NoTeleponPengirim' => $request->get('NoTeleponPengirim')
              ]);

            return redirect()->route('peng')->with('message', 'Pengirim berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pengirim = Pengirim::find($id);
        $pengirim->delete();
        return redirect()->route('peng')->with('message', 'Pengirim berhasil dihapus');
    }
}
