@extends('layouts.app')
@section('title','Tambah Data - Kelas')
@section('content')
    
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border shadow-sm rounded">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('kelas.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <input type="text" name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Jurusan</label>
                            <input type="text" name="jurusan" id="" class="form-control">
                        </div>
                        <a href="{{ route('kelas.index') }}" class="btn btn-warning">Kembali</a>
                        <button type="reset" class="btn btn-danger ml-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection