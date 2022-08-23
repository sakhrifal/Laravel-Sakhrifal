@extends('layouts/main')
@extends('layouts/header')

@section('head') @endsection   

@section('main')
{{-- <div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Data Pegawai
        </div>
        <div class="card-header">
            <form action="/logout" method="post">
                @csrf
                <button class="btn btn-primary d-block ms-auto">Logout</button>
            </form>
        </div>
        <div class="card-body">
            <a href="/insert" class="btn btn-primary">Input Pegawai Baru</a>
            <br/>
            <br/>
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>OPSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pegawais as $pegawai)
                    <tr>
                        <td>{{ $pegawai->name }}</td>
                        <td>{{ $pegawai->alamat }}</td>
                        <td>{{ $pegawai->email }}</td>
                        <td>
                            <a href="/update/{{ $pegawai->id }}" class="btn btn-warning">Edit</a>
                            <a href="/hapus/{{ $pegawai->id }}" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div> --}}
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