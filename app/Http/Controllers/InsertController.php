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
        $validatedData = $request->validate([
            'fullname' => ['required','min:3','max:255', 'unique:pegawais,name'],
            'email' => ['required', 'email','unique:pegawais'],
            'alamat' => ['required', 'max:255'],
            'inputFoto' => ['required','file','max:1024']
        ]);
        $validatedData['user_id']=auth()->user()->id;
        $image = $request->file('inputFoto')->store('post-image');
        pegawai::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'gambar' => $image
        ]);
        return redirect('/insert')->with('status','Saved..!!');
    }
}