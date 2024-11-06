@extends('layouts.app')
@section('title','Tambah Data - Siswa')
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
                    <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" value="{{ $siswa->nama }}" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">NIS</label>
                            <input type="number" name="nis" value="{{ $siswa->nis }}" id="" min="0" max="99999999999999999" oninput="this.value = this.value.slice(0,10);"  class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tanggal" id="" value="{{ $siswa->tanggal }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Kelas</label>
                            <select name="kelas_id" class="form-control">
                                @foreach($kelaslist as $kelas)
                                    <option value="{{ $kelas->id }}" {{ $siswa->kelas_id == $kelas->id ? 'selected' : '' }}>
                                        {{ $kelas->nama }} - {{ $kelas->jurusan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <a href="{{ route('siswa.index') }}" class="btn btn-warning">Kembali</a>
                        <button type="reset" class="btn btn-danger ml-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection