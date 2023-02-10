<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Resi Pengiriman</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card">
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
                        <b>Penerima :
                            {{ $resi->penerima->NamaPenerima }},<br>{{ $resi->penerima->AlamatPenerima }}</b><br>
                        <table width="100%" style="border: 1px solid black">
                            <thead style="text-align:center;">
                                <th style="border: 1px solid black">{{ $resi->Kuantitas * $resi->barang->BeratBarang}}
                                    KG</th>
                                <th style="border: 1px solid black">EZ</th>
                                <th style="border: 1px solid black">BULANAN</th>
                                <th style="border: 1px solid black">Ship : {{ $resi->TanggalPengiriman }}</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="4">
                                        Qty : {{ $resi->Kuantitas }} pcs, Barang :
                                        {{ $resi->barang->NamaBarang }}<br><br>
                                        <i><b>Syarat dan ketentuan pengiriman dapat dilihat pada website
                                                www.jnt.co.id</b></i><br>
                                        {{ $resi->kantor->NamaKantorPusat }}, {{ $resi->kantor->NpwpKantorPusat }}<br>
                                        {{ $resi->kantor->AlamatKantorPusat }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</body>

</html>
