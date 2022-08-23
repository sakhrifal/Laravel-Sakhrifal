@extends('layouts.main')
@extends('layouts/header')

@section('head') @endsection

@section('main')
    <div class="row g-5">
        <div class="col-lg-12">
            @if (session()->has('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form class="needs-validation" action="/insert" method="post" novalidate enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="row g-3">
                <div class="form-floating">
                    <input type="text" class="form-control @error('fullname') is-invalid @enderror" id="fullName" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}" required>
                    <label for="fullName">Full Name</label>
                    @error('fullname')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Email" required>
                    <label for="email">Email</label>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                

                <div class="form-floating">
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" value="{{ old('alamat') }}" placeholder="Jl. Jalan No.01" required>
                    <label for="alamat">Alamat</label>
                    @error('alamat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="inputFoto" class="form-label">Input Foto</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control @error('inputFoto') is-invalid @enderror" type="file" id="inputFoto" name="inputFoto" required onchange="previewImage()">
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