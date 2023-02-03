<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kantor;

class KantorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kantors = Kantor::all();
        return view('kantorpusat.index', compact('kantors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kantorpusat.create');
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
            'NamaKantorPusat'=>'required|min:3|max:50',
            'AlamatKantorPusat'=>'required|min:3'
        ], ['NamaKantorPusat.required'=>'Isi nama kantor pusat terlebih dahulu',
            'NamaKantorPusat.min'=>'Minimal 3 karakter',
            'NamaKantorPusat.max'=>'Jangan lebih dari 50 karakter',
            'AlamatKantorPusat.required'=>'Isi alamat kantor pusat terlebih dahulu',
            'AlamatKantorPusat.min'=>'Minimal 3 karakter']);

            Kantor::create([
                'NamaKantorPusat' => $request->get('NamaKantorPusat'),
                'AlamatKantorPusat' => $request->get('AlamatKantorPusat')
              ]);

            return redirect()->route('kan')->with('message', 'Kantor Pusat berhasil disimpan');
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
        $kantor = Kantor::find($id);
        return view ('kantorpusat.edit', compact('kantor'));
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
            'NamaKantorPusat'=>'required|min:3|max:50',
            'AlamatKantorPusat'=>'required|min:3'
        ], ['NamaKantorPusat.required'=>'Isi nama kantor pusat terlebih dahulu',
            'NamaKantorPusat.min'=>'Minimal 3 karakter',
            'NamaKantorPusat.max'=>'Jangan lebih dari 50 karakter',
            'AlamatKantorPusat.required'=>'Isi alamat kantor pusat terlebih dahulu',
            'AlamatKantorPusat.min'=>'Minimal 3 karakter']);

            Kantor::find($id)->update([
                'NamaKantorPusat' => $request->get('NamaKantorPusat'),
                'AlamatKantorPusat' => $request->get('AlamatKantorPusat')
              ]);

            return redirect()->route('kan')->with('message', 'Kantor Pusat berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kantor = Kantor::find($id);
        $kantor->delete();
        return redirect()->route('kan')->with('message', 'Kantor berhasil dihapus');
    }
}
