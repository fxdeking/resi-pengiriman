@extends('layouts.app')
<title>Edit Resi Pengiriman</title>
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-20">
        <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title">Edit Resi Pengiriman</h5>
        </div>
            <div class="card-body">
            <form action="{{ route('updateres', [$resi->NoResiPengiriman]) }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nomor Resi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('NoResi') is-invalid @enderror" name="NoResi" value="{{ $resi->NoResi }}">
                            @error('NoResi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Jasa Pengiriman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('NamaJasaPengiriman') is-invalid @enderror" name="NamaJasaPengiriman" value="{{ $resi->NamaJasaPengiriman }}">
                            @error('NamaJasaPengiriman')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nomor Telepon Jasa Pengiriman</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('NoTeleponJasaPengiriman') is-invalid @enderror" name="NoTeleponJasaPengiriman" value="{{ $resi->NoTeleponJasaPengiriman }}">
                            @error('NoTeleponJasaPengiriman')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Tanggal Pengiriman</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control @error('TanggalPengiriman') is-invalid @enderror" name="TanggalPengiriman" value="{{ $resi->TanggalPengiriman }}">
                            @error('TanggalPengiriman')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="NoBarang">
                                @foreach(App\Models\Barang::all() as $barang)
                                <option value="{{ $barang->NoBarang }}" {{ ($resi->NoBarang=="$barang->NoBarang")? "selected" : "" }}>{{ $barang->NamaBarang }}</option>
                                @endforeach
                            </select>
                            @error('NoBarang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Kuantitas Barang</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('Kuantitas') is-invalid @enderror" name="Kuantitas" value="{{ $resi->Kuantitas }}">
                            @error('Kuantitas')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Kantor Pusat</label>
                        <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="NoPusat">
                                @foreach(App\Models\Kantor::all() as $kantor)
                                <option value="{{ $kantor->NoPusat }}" {{ ($resi->NoPusat=="$kantor->NoPusat")? "selected" : "" }}>{{ $kantor->NamaKantorPusat }}</option>
                                @endforeach
                            </select>
                            @error('NoPusat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Pengirim</label>
                        <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="NoPengirim">
                                @foreach(App\Models\Pengirim::all() as $pengirim)
                                <option value="{{ $pengirim->NoPengirim }}" {{ ($resi->NoPengirim=="$pengirim->NoPengirim")? "selected" : "" }}>{{ $pengirim->NamaPengirim }}</option>
                                @endforeach
                            </select>
                            @error('NoPengirim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Penerima</label>
                        <div class="col-sm-10">
                        <select class="form-select" aria-label="Default select example" name="NoPenerima">
                                @foreach(App\Models\Penerima::all() as $penerima)
                                <option value="{{ $penerima->NoPenerima }}" {{ ($resi->NoPenerima=="$penerima->NoPenerima")? "selected" : "" }}>{{ $penerima->NamaPenerima }}</option>
                                @endforeach
                            </select>
                            @error('NoPenerima')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <br>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </div>

                </form>
            </div>
          </div>
</div>
@endsection
