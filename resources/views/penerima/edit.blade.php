@extends('layouts.app')
<title>Create Penerima</title>
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title">Create Penerima</h5>
        </div>
            <div class="card-body">
            <form action="{{ route('updatepen', [$penerima->NoPenerima]) }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Penerima</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('NamaPenerima') is-invalid @enderror" name="NamaPenerima" value="{{ $penerima->NamaPenerima }}">
                            @error('NamaPenerima')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Alamat Penerima</label>
                        <div class="col-sm-10">
                        <textarea class="form-control @error('AlamatPenerima') is-invalid @enderror" name="AlamatPenerima" rows="2">{{ $penerima->AlamatPenerima }}</textarea>
                            @error('AlamatPenerima')
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
