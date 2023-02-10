@extends('layouts.app')
<title>Cetak Resi Pengiriman</title>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card">
                <div class="card-header py-3">
                    <h5 class="card-title">Cetak Resi Pengiriman</h5>
                </div>
                <div class="card-body">
                    <b>{{ $resi->NamaJasaPengiriman }}</b>
                    @php
                    $generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
                    @endphp

                    <img src="data:image/png;base64,{{ base64_encode($generatorPNG->getBarcode($resi->NoResi, $generatorPNG::TYPE_CODE_128)) }}"
                        style="margin-left:35%;"><br>
                    <b>{{ $resi->NoTeleponJasaPengiriman }}</b> <b style="margin-left:37%;">{{ $resi->NoResi }}</b>
                    <hr><b>Pengirim : {{ $resi->pengirim->NamaPengirim }},
                        {{ $resi->pengirim->NoTeleponPengirim }}</b><br>
                    <b>Penerima : {{ $resi->penerima->NamaPenerima }},<br>{{ $resi->penerima->AlamatPenerima }}</b><br>
                    <table width="100%" style="border: 1px solid black">
                        <thead style="text-align:center;">
                            <th style="border: 1px solid black">{{ $resi->Kuantitas * $resi->barang->BeratBarang}} KG
                            </th>
                            <th style="border: 1px solid black">EZ</th>
                            <th style="border: 1px solid black">BULANAN</th>
                            <th style="border: 1px solid black">Ship : {{ $resi->TanggalPengiriman }}</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="4">
                                    Qty : {{ $resi->Kuantitas }} pcs, Barang : {{ $resi->barang->NamaBarang }}<br><br>
                                    <i><b>Syarat dan ketentuan pengiriman dapat dilihat pada website
                                            www.jnt.co.id</b></i><br>
                                    {{ $resi->kantor->NamaKantorPusat }}, {{ $resi->kantor->NpwpKantorPusat }}<br>
                                    {{ $resi->kantor->AlamatKantorPusat }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br><br>
                    <div class="row">
                        <div class="col-sm-10">
                            <a href="{{ route('ceres', [$resi->NoResiPengiriman]) }}" class="btn btn-primary">Cetak</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection
