@extends('layouts.app')
<title>List Barang</title>
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title">List Barang</h5>
          <br>
          @if(Session::has('message'))
          <p class="alert alert-success alert-dismissable">{{ Session::get('message') }} <button
                  type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button></p>
          @endif
        </div>
            <div class="card-body">
                
        <a class="btn btn-info" href="{{ route('inputbar') }}">[+] Create Barang</a><br>
<br>
              <!-- Table with hoverable rows -->
              <table class="table table-hover table-bordered" style="text-align:center;">
                <thead>
                  <tr>
                    <th scope="col" width="50px">No</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Berat Barang (KG)</th>
                    <th scope="col" colspan="2" width="20%">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                @if(count($barangs)>0)
                    @foreach ($barangs as $barang)
                    <tr>
                        <th scope="row" style="text-align:center;">{{ $loop->iteration }}</th>
                        <td style="text-align:center;">{{ $barang->NamaBarang }}</td>
                        <td style="text-align:center;">{{ $barang->BeratBarang }} KG</td>
                        <td style="text-align:center;"><a href="{{ route('editbar', [$barang->NoBarang]) }}"
                                class="btn btn-info">Edit</a></td>
                        <td style="text-align:center;"><button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#exampleModal{{$barang->NoBarang}}">Hapus</button></td>
                    </tr>

                    <div class="modal fade" id="exampleModal{{$barang->NoBarang}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{ route('deletebar', [$barang->NoBarang]) }}" method="POST">@csrf
                                {{method_field('DELETE')}}
                                <div class="modal-content">
                                    <div class="modal-header" style="display:flex;">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus Barang</h5>
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
                    <td colspan="4" style="text-align:center;"><br>
                        <p>Tidak ada barang yang dapat ditampilkan.</p>
                    </td>
                    @endif
                </tbody>
              </table>
              <!-- End Table with hoverable rows -->

            </div>
          </div>
</div>
@endsection
