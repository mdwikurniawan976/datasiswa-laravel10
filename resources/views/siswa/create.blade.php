@extends('layouts.app')
@section('title','Tambah Data - Siswa')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border shadow-sm rounded">
                <div class="card-body">
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">NIS</label>
                            <input type="number" name="nis" id="" min="0" max="99999999999999999" oninput="this.value = this.value.slice(0,10);"  class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas_id" class="form-control" id="">
                                <option value="">Pilih Kelas</option>
                                @foreach ($kelaslist as $kelas)
                                    <option value="{{ $kelas->id }}">{{ $kelas->nama }} - {{ $kelas->jurusan }}</option>
                                @endforeach
                            </select>
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