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
        $validatedData = $request->validate([
            'fullname' => ['required','min:3','max:255'],
            'email' => ['required', 'email'],
            'alamat' => ['required', 'max:255'],
            'inputFoto' => ['file','max:1024']
        ]);
        $validatedData['user_id']=auth()->user()->id;
        $pegawai = pegawai::find($id);
        $pegawai->name = $request->fullname;
        $pegawai->email = $request->email;
        $pegawai->alamat = $request->alamat;
        if($request->file('inputFoto')){
            $pegawai->gambar =  $request->file('inputFoto')->store('post-image'); 
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
        }
        $pegawai->update();
        return redirect('/')->with('status','Updated....!!!');
    }

    public function delete ($id) { 
        $pegawai = Pegawai::find($id);
        if($pegawai->gambar){
            Storage::delete($pegawai->gambar);
        }
        $pegawai->delete();
        return redirect('/')->with('status','Deleted....!!!');
    }
}
