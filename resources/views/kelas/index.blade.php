@extends('layouts.app')
@section('title','Data - Kelas')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card border shadow-sm rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('dashboard.index') }}" class="btn btn-warning">Kembali</a>
                            <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Kelas </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse ($kelas as $item)
                              <tr class="text-center">
                               <td>{{ $item->nama }}</td>
                               <td>{{ $item->jurusan }}</td>
                               <td>
                                <form action="{{ route('kelas.destroy', $item->id) }}" onsubmit="return confirm('Apakah anda yakin akan menghapus data {{ $item->nama }}');" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('kelas.edit', $item->id) }}" class="btn btn-dark">Edit</a>
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                               </td>
                               </tr>  
                            @empty
                                <div class="alert alert-danger">
                                    Tidak ada data yang tersedia untuk ditampilkan!!
                                </div>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $kelas->links('pagination::bootstrap-5') }}
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