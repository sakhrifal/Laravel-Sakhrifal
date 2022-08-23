<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function index($id){
        $pegawai = Pegawai::find($id);
        return view('update', [
            'title' => 'Update Data Pegawai',
            'pegawai' => $pegawai
        ]);
    }

    public function update ($id, Request $request) {
        $image = $request->file('inputFoto')->store('post-image');
        $pegawai = pegawai::find($id);
        $pegawai->name = $request->fullname;
        $pegawai->email = $request->email;
        $pegawai->alamat = $request->alamat;
        $pegawai->gambar = $image;
        if($request->oldImage){
            Storage::delete($request->oldImage);
        }
        $pegawai->update();
        return redirect('/');
    }

    public function delete ($id) { 
        $pegawai = Pegawai::find($id);
        if($pegawai->gambar){
            Storage::delete($pegawai->gambar);
        }
        $pegawai->delete();
        return redirect('/');
    }
}
