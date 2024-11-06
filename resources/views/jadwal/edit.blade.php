@extends('layouts.app')
@section('title','Edit Data - Mata Pelajaran')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-2">
                <div class="card border shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('jadwal.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Kelas</label>
                                <select name="kelas_id" class="form-control" id="">
                                    <option value="">Pilih Kelas</option>
                                    @foreach ($kelaslist as $kelas)
                                        <option value="{{ $kelas->id }}">{{ $kelas->nama }} - {{ $kelas->jurusan }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Guru</label>
                                 <select name="guru_id" id="" class="form-control">
                                    <option value="">Pilih Guru </option>
                                    @foreach ($guru as $g )
                                        <option value="{{ $g->id }}">{{ $g->nama }}</option>
                                    @endforeach
                                 </select>
                            </div>

                            <div class="form-group">
                                <label for="">Mata Pelajaran</label>
                                <input type="text" class="form-control" name="nama" value="{{ $jadwal->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="day">Hari</label>
                                <select name="day_of_week" id="day" class="form-control" required>
                                    <option value="">Pilih Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Waktu Mulai</label>
                                <input type="time" name="waktu_mulai" id="" class="form-control" value="{{ $jadwal->waktu_mulai }}">
                            </div>
                            <div class="form-group">
                                <label for="">Waktu Habis</label>
                                <input type="time" name="waktu_habis" id="" class="form-control" value="{{ $jadwal->waktu_habis }}">
                            </div>
                            <a href="{{ route('jadwal.index') }}" class="btn btn-info">Kembali</a>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection