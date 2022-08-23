@extends('layouts.main')
@extends('layouts/header')

@section('head') @endsection

@section('main')
    <div class="row g-5">
        <div class="col-lg-12">
            <form class="needs-validation" action="/update/{{ $pegawai->id }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="row g-3">
                <div class="form-floating">
                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullName" name="fullname" value="{{ $pegawai->name }}">
                    <label for="fullName">Full Name</label>
                    @error('fullname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $pegawai->email }}">
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ $pegawai->alamat }}">
                    <label for="alamat">Alamat</label>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="inputFoto" class="form-label">Input Foto</label>
                    <input type="hidden" name="oldImage" value="{{ $pegawai->gambar }}">
                    @if ($pegawai->gambar)
                        <img src="{{ asset('storage/'. $pegawai->gambar) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                        <input class="form-control @error('inputFoto') is-invalid @enderror" type="file" id="inputFoto" name="inputFoto" onchange="previewImage()">
                        @error('inputFoto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                  </div>
                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" type="submit" value="simpan">SIMPAN</button>
                <script>
                    function previewImage(){
                    const image = document.querySelector('#inputFoto')
                    const imgPreview = document.querySelector('.img-preview')

                    imgPreview.style.display ='block';

                    const oFReader = new FileReader();

                    oFReader.readAsDataURL(image.files[0]);

                    oFReader.onload = function(oFREvent){
                        imgPreview.src = oFREvent.target.result;
                    }

                    }
                </script>
            </form>
        </div>
    </div> 
@endsection