@extends('layouts.app')
<title>Create Pengirim</title>
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title">Create Pengirim</h5>
        </div>
            <div class="card-body">
            <form action="{{ route('updatepeng', [$pengirim->NoPengirim]) }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Pengirim</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('NamaPengirim') is-invalid @enderror" name="NamaPengirim" value="{{ $pengirim->NamaPengirim }}">
                            @error('NamaPengirim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nomor Telepon Pengirim</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('NoTeleponPengirim') is-invalid @enderror" name="NoTeleponPengirim" value="{{ $pengirim->NoTeleponPengirim }}">
                            @error('NoTeleponPengirim')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="row mb-3">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
          </div>
</div>
@endsection
