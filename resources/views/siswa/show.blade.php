@extends('layouts.app')
@section('title','Detail Data - Siswa')
@section('content')
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border shadow-sm rounded">
                    <div class="card-body">
                        <img src="{{ asset('storage/foto/'. $siswa->foto) }}" class="w-100 rounded" alt="">
                        <hr>
                         <h3>{{ $siswa->nama }}</h3>
                         <h4>{{ $siswa->kelas->nama }} - {{ $siswa->kelas->jurusan }}</h4>
                         <td>{{ $siswa->nis }}</td>
                         <div></div>
                         <td>{{ $siswa->tanggal }}</td>
                         <div class="d-flex justify-content-end">

                             <a href="{{ route('siswa.index') }}" class="btn btn-secondary mt-2">Kembali</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection