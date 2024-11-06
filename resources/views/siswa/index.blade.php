@extends('layouts.app')
@section('title','Data Siswa')
@section('content')
     <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card border shadow-sm rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('dashboard.index') }}" class="btn btn-warning">Kembali</a>
                            <a href="{{ route('siswa.create') }}" class="btn btn-primary">Tambah Siswa </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>NIS</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($siswa as $item)
                                <tr class="text-center">
                                    <td>
                                        <img src="{{ asset('storage/foto/'. $item->foto) }}" style="width: 150px" class="rounded" alt="">
                                    </td>
                                    <td>
                                        {{ $item->nama }}
                                    </td>
                                    <td>{{ $item->nis }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->kelas->nama }} - {{ $item->kelas->jurusan }}</td>
                                    <td>
                                        <form action="{{ route('siswa.destroy', $item->id) }}" onsubmit="return confirm('apakah anda yakin akan menghapus data siswa {{ $item->nama }}');" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('siswa.show', $item->id) }}" class="btn btn-dark">Detail</a>
                                            <a href="{{ route('siswa.edit', $item->id) }}" class="btn btn-warning">Edit</a>
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
            toastr.success('{{ session('success') }}','y');
        @endif
    </script>
@endsection