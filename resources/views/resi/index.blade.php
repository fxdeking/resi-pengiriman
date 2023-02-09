@extends('layouts.app')
<title>List Resi Pengiriman</title>
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-20">
        <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title">List Resi Pengiriman</h5>
          <br>
          @if(Session::has('message'))
          <p class="alert alert-success alert-dismissable">{{ Session::get('message') }} <button
                  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>
          @endif
        </div>
            <div class="card-body">
                
        <a class="btn btn-info" href="{{ route('inputres') }}">[+] Create Resi Pengiriman</a><br>
<br>
              <!-- Table with hoverable rows -->
              <table class="table table-hover table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th scope="col" width="50px">No</th>
                    <th scope="col">Nomor Resi</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kuantitas</th>
                    <th scope="col">Tanggal Pengiriman</th>
                    <th scope="col">Nama Kantor Pusat</th>
                    <th scope="col">Nama Pengirim</th>
                    <th scope="col">Nama Penerima</th>
                    <th scope="col" colspan="2" width="10%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($resis)>0)
                    @foreach ($resis as $resi)
                    <tr>
                        <th scope="row" style="text-align:center;">{{ $loop->iteration }}</th>
                        <td style="text-align:center;">{{ $resi->NoResi }}</td>
                        <td style="text-align:center;">{{ $resi->barang->NamaBarang }}</td>
                        <td style="text-align:center;">{{ $resi->Kuantitas }}</td>
                        <td style="text-align:center;">{{ $resi->TanggalPengiriman }}</td>
                        <td style="text-align:center;">{{ $resi->kantor->NamaKantorPusat }}</td>
                        <td style="text-align:center;">{{ $resi->pengirim->NamaPengirim }}</td>
                        <td style="text-align:center;">{{ $resi->penerima->NamaPenerima }}</td>
                        <td style="text-align:center;"><a href="{{ route('editres', [$resi->NoResiPengiriman]) }}"
                                class="btn btn-info">Edit</a></td>
                        <td style="text-align:center;"><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{$resi->NoResiPengiriman}}">Hapus</button></td>
                    </tr>

                    <div class="modal fade" id="exampleModal{{$resi->NoResiPengiriman}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ route('deleteres', [$resi->NoResiPengiriman]) }}" method="POST">@csrf
                                {{method_field('DELETE')}}
                                <div class="modal-content">
                                    <div class="modal-header" style="display:flex;">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Resi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda yakin ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <td colspan="10" style="text-align:center;"><br>
                        <p>Tidak ada resi yang dapat ditampilkan.</p>
                    </td>
                    @endif
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>
</div>
@endsection
