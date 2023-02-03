@extends('layouts.app')
<title>Edit Kantor Pusat</title>
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title">Edit Kantor Pusat</h5>
        </div>
            <div class="card-body">
            <form action="{{ route('updatekan', [$kantor->NoPusat]) }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Kantor Pusat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('NamaKantorPusat') is-invalid @enderror" name="NamaKantorPusat" value="{{ $kantor->NamaKantorPusat }}">
                            @error('NamaKantorPusat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Alamat Kantor Pusat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('AlamatKantorPusat') is-invalid @enderror" name="AlamatKantorPusat" value="{{ $kantor->AlamatKantorPusat }}">
                            @error('AlamatKantorPusat')
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
