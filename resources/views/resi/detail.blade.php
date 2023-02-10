@extends('layouts.app')
<title>Detail Resi Pengiriman</title>
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-20">
        <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title">Detail Resi Pengiriman</h5>
        </div>
            <div class="card-body">
                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Nomor Resi</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->NoResi }}</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Barcode Resi</label>
                        <div class="col-sm-10">
                            @php
                                $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                            @endphp
                            
                            <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($resi->NoResi, $generatorPNG::TYPE_CODE_128)) }}">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Jasa Pengiriman</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->NamaJasaPengiriman }}</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Nomor Telepon Jasa Pengiriman</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->NoTeleponJasaPengiriman }}</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Tanggal Pengiriman</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->TanggalPengiriman }}</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->barang->NamaBarang }}</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Kuantitas Barang</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->Kuantitas }} Pcs</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Berat Total</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->Kuantitas * $resi->barang->BeratBarang}} KG</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">NPWP Kantor Pusat</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->kantor->NpwpKantorPusat }}</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Kantor Pusat</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->kantor->NamaKantorPusat }}</b>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Alamat Kantor Pusat</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->kantor->AlamatKantorPusat }}</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Pengirim</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->pengirim->NamaPengirim }}</b>
                        </div>
                    </div>

                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Nomor Telepon Pengirim</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->pengirim->NoTeleponPengirim }}</b>
                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Penerima</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->penerima->NamaPenerima }}</b>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Alamat Penerima</label>
                        <div class="col-sm-10">
                            : <b>{{ $resi->penerima->AlamatPenerima }}</b>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-sm-10">
                            <a href="{{ route('cetakres', [$resi->NoResiPengiriman]) }}" class="btn btn-primary">Cetak Resi Pengiriman</a>
                        </div>
                    </div>

                </form>
            </div>
          </div>
</div>
@endsection
