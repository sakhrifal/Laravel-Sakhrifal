@extends('layouts.main')
@extends('layouts/header')

@section('head') @endsection

@section('main')
    <div class="row g-5">
        <div class="col-lg-12">
            <form class="needs-validation" action="/insert" method="post" novalidate enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="row g-3">
                <div class="form-floating">
                    <input type="text" class="form-control" id="fullName" name="fullname" placeholder="Full Name" value="" required>
                    <label for="fullName">Full Name</label>
                </div>
                
                <div class="form-floating">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                    <label for="email">Email</label>
                </div>
                

                <div class="form-floating">
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Jl. Jalan No.01" required>
                    <label for="alamat">Alamat</label>
                </div>

                <div class="mb-3">
                    <label for="inputFoto" class="form-label">Input Foto</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                    <input class="form-control" type="file" id="inputFoto" name="inputFoto" required onchange="previewImage()">
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