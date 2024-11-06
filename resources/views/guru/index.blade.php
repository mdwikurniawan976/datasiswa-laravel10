@extends('layouts.app')
@section('title','Data - Guru')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card border shadow-sm rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('dashboard.index') }}" class="btn btn-warning">Kembali</a>
                            <a href="{{ route('guru.create') }}" class="btn btn-primary">Tambah Guru </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No Hp</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($g as $item)
                                    <tr class="text-center">
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->nohp }}</td>
                                        <td>
                                            <form action="{{ route('guru.destroy', $item->id) }}" onsubmit="return confirm('apakah anda yakin akan menghapus data guru {{ $item->nama }}')" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('guru.edit', $item->id) }}" class="btn btn-dark">Edit</a>
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        tidak ada data yang tersedia untuk ditampilkan
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>

    <script>
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'Berhasil')
        @endif
    </script>
@endsection