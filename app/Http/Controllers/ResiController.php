<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resi;
use \PDF;

class ResiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resis = Resi::all();
        return view('resi.index', compact('resis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('resi.create');
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
            'NoResi'=>'required|min:3|max:50',
            'NamaJasaPengiriman'=>'required|min:3|max:50',
            'NoTeleponJasaPengiriman'=>'required|min:3|max:15',
            'TanggalPengiriman'=>'required',
            'NoBarang'=>'required',
            'Kuantitas'=>'required|min:1|max:10',
            'NoPusat'=>'required',
            'NoPengirim'=>'required',
            'NoPenerima'=>'required',
        ], ['NoResi.required'=>'Isi nomor resi terlebih dahulu',
            'NoResi.min'=>'Minimal 3 karakter',
            'NoResi.max'=>'Jangan lebih dari 50 karakter',
            'NamaJasaPengiriman.required'=>'Isi nama jasa pengiriman terlebih dahulu',
            'NamaJasaPengiriman.min'=>'Minimal 3 karakter',
            'NamaJasaPengiriman.max'=>'Jangan lebih dari 50 karakter',
            'NoTeleponJasaPengiriman.required'=>'Isi nomor telepon jasa pengiriman terlebih dahulu',
            'NoTeleponJasaPengiriman.min'=>'Minimal 3 karakter',
            'NoTeleponJasaPengiriman.max'=>'Jangan lebih dari 15 karakter',
            'Kuantitas.required'=>'Isi kuantitas barang terlebih dahulu',
            'Kuantitas.min'=>'Minimal 1 karakter',
            'Kuantitas.max'=>'Jangan lebih dari 10 karakter',
            'NoBarang.required'=>'Pilih barang terlebih dahulu',
            'NoPusat.required'=>'Pilih kantor pusat terlebih dahulu',
            'NoPengirim.required'=>'Pilih pengirim terlebih dahulu',
            'NoPenerima.required'=>'Pilih penerima terlebih dahulu']);

            Resi::create([
                'NoResi' => $request->get('NoResi'),
                'NamaJasaPengiriman' => $request->get('NamaJasaPengiriman'),
                'NoTeleponJasaPengiriman' => $request->get('NoTeleponJasaPengiriman'),
                'TanggalPengiriman' => $request->get('TanggalPengiriman'),
                'Kuantitas' => $request->get('Kuantitas'),
                'NoBarang' => $request->get('NoBarang'),
                'NoPusat' => $request->get('NoPusat'),
                'NoPenerima' => $request->get('NoPenerima'),
                'NoPengirim' => $request->get('NoPengirim')
              ]);

            return redirect()->route('res')->with('message', 'Resi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $resi = Resi::find($id);
        return view ('resi.detail', compact('resi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $resi = Resi::find($id);
        return view ('resi.edit', compact('resi'));
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
            'NoResi'=>'required|min:3|max:50',
            'NamaJasaPengiriman'=>'required|min:3|max:50',
            'NoTeleponJasaPengiriman'=>'required|min:3|max:15',
            'TanggalPengiriman'=>'required',
            'NoBarang'=>'required',
            'Kuantitas'=>'required|min:1|max:10',
            'NoPusat'=>'required',
            'NoPengirim'=>'required',
            'NoPenerima'=>'required',
        ], ['NoResi.required'=>'Isi nomor resi terlebih dahulu',
            'NoResi.min'=>'Minimal 3 karakter',
            'NoResi.max'=>'Jangan lebih dari 50 karakter',
            'NamaJasaPengiriman.required'=>'Isi nama jasa pengiriman terlebih dahulu',
            'NamaJasaPengiriman.min'=>'Minimal 3 karakter',
            'NamaJasaPengiriman.max'=>'Jangan lebih dari 50 karakter',
            'NoTeleponJasaPengiriman.required'=>'Isi nomor telepon jasa pengiriman terlebih dahulu',
            'NoTeleponJasaPengiriman.min'=>'Minimal 3 karakter',
            'NoTeleponJasaPengiriman.max'=>'Jangan lebih dari 15 karakter',
            'Kuantitas.required'=>'Isi kuantitas barang terlebih dahulu',
            'Kuantitas.min'=>'Minimal 1 karakter',
            'Kuantitas.max'=>'Jangan lebih dari 10 karakter',
            'NoBarang.required'=>'Pilih barang terlebih dahulu',
            'NoPusat.required'=>'Pilih kantor pusat terlebih dahulu',
            'NoPengirim.required'=>'Pilih pengirim terlebih dahulu',
            'NoPenerima.required'=>'Pilih penerima terlebih dahulu']);

            Resi::find($id)->update([
                'NoResi' => $request->get('NoResi'),
                'NamaJasaPengiriman' => $request->get('NamaJasaPengiriman'),
                'NoTeleponJasaPengiriman' => $request->get('NoTeleponJasaPengiriman'),
                'TanggalPengiriman' => $request->get('TanggalPengiriman'),
                'Kuantitas' => $request->get('Kuantitas'),
                'NoBarang' => $request->get('NoBarang'),
                'NoPusat' => $request->get('NoPusat'),
                'NoPenerima' => $request->get('NoPenerima'),
                'NoPengirim' => $request->get('NoPengirim')
              ]);

            return redirect()->route('res')->with('message', 'Resi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $resi = Resi::find($id);
        $resi->delete();
        return redirect()->route('res')->with('message', 'Resi berhasil dihapus');
    }

    public function cetakresi($id)
    {
        $resi = Resi::find($id);
        return view ('resi.cetakresi', compact('resi'));
    }

    public function cetak($id)
    {
        $resi = Resi::find($id);
        $cetak = PDF::loadview('resi.cetak', compact('resi'));
        return $cetak->download('Resi Pengiriman.pdf');
    }
}
