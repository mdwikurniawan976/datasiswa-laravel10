@extends('layouts.app')
@section('title','Dashboard')
@section('content')


<div class="container mt-5" style="font-family: 'Poppins', sans-serif;">
    <div class="row justify-content-center">
        <div class="col-md-5 mt-5">
        <div class="card border shadow-sm rounded mt-5 mb-5">
            <div class="card-body">
                <h3 class="text-center">Dashboard</h3>
                <h5 class="text-center">KING</h5>
                <a href="{{ route('kelas.index') }}" class="btn btn-md btn-danger w-100 mt-2">Kelas</a>
                <a href="{{ route('siswa.index') }}" class="btn btn-md btn-primary w-100 mt-2">Siswa</a>
                <a href="{{ route('guru.index') }}" class="btn btn-md btn-info w-100 mt-2">Guru</a>
                <a href="{{ route('jadwal.index') }}" class="btn btn-md btn-success w-100 mt-2">Jadwal Pelajaran</a>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection