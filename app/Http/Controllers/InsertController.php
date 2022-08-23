<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;

class InsertController extends Controller
{
    public function index() {
        return view('insert',[
           'title' => 'Insert Data Pegawai' 
        ]);
    }

    public function save( Request $request) {
        $image = $request->file('inputFoto')->store('post-image');
        pegawai::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'gambar' => $image
        ]);
        return redirect('/');
    }
}