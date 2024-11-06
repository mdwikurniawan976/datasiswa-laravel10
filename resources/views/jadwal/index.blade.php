@extends('layouts.app')
@section('title','Jadwal Pelajaran')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="card border shadow-sm rounded">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3">
                            <a href="{{ route('dashboard.index') }}" class="btn btn-info">Kembali</a>
                            <a href="{{ route('jadwal.create') }}" class="btn btn-primary">Tambah Jadwal Pelajaran  </a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>Kelas</th>
                                    <th>Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Hari</th>
                                    <th>Mulai jam</th>
                                    <th>Akhir jam</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($jadwal as $item)
                                <tr class="text-center">
                                    <td>{{ $item->kelas->nama }} - {{ $item->kelas->jurusan }}</td>
                                    <td>{{ $item->guru->nama }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->day_of_week }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->waktu_mulai)->format('H:i') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->waktu_habis)->format('H:i') }}</td>
                                    <td>
                                        <form action="" method="POST" onsubmit="return confirm('apakah anda yakin akan menghapus jadwal {{ $item->nama }}');">
                                         @csrf   
                                         <a href="{{ route('jadwal.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                                         <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        empty
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $jadwal->links('pagination::bootstrap-5') }}
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
            toastr.success('{{ session('success') }}','ty');
        @endif
    </script>
@endsection