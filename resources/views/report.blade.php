@extends('layouts/main')
@extends('layouts/header')

@section('head') @endsection   

@section('main')
@if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">OPSI</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach($pegawais as $pegawai)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $pegawai->name }}</td>
                    <td>{{ $pegawai->alamat }}</td>
                    <td>{{ $pegawai->email }}</td>
                    <td><img src="{{ asset('storage/'. $pegawai->gambar) }}" class="img-thumbnail" width="50px"  alt="{{ $pegawai->gambar }}" sizes="3"></td>
                    <td>
                        <a href="/update/{{ $pegawai->id }}" class="btn btn-warning">Edit</a>
                        <a href="/hapus/{{ $pegawai->id }}" class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection