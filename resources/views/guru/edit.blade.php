@extends('layouts.app')
@section('title','Edit Data - Guru')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('guru.update',$guru->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" name="nama" id="" class="form-control" value="{{ $guru->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" id="" class="form-control" value="{{ $guru->email }}">
                        </div>
                        <div class="form-group">
                            <label for="">NoHp</label>
                            <input type="number" name="nohp" id="" value="{{ $guru->nohp }}" min="0" max="99999999999999999" oninput="this.value = this.value.slice(0,10);"  class="form-control" required>
                        </div>
                        <a href="{{ route('guru.index') }}" class="btn btn-warning">Kembali</a>
                        <button type="reset" class="btn btn-danger ml-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection