@extends('layouts.app')
<title>Create Barang</title>
@section('content')
<div class="container">
<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="card">
        <div class="card-header py-3">
          <h5 class="card-title">Create Barang</h5>
        </div>
            <div class="card-body">
            <form action="{{ route('tambahbar') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Nama Barang</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control @error('NamaBarang') is-invalid @enderror" name="NamaBarang" value="{{ old('NamaBarang') }}">
                            @error('NamaBarang')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Berat Barang (KG)</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control @error('BeratBarang') is-invalid @enderror" name="BeratBarang" value="{{ old('BeratBarang') }}">
                            @error('BeratBarang')
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
