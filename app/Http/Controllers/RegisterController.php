<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('login.register',[
            'title' => 'Form Registrasi'
        ]);
    }

    public function create(Request $request){
        $validatedData = $request->validate([
            'name' => ['required','min:3','max:255', 'unique:users'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required', 'min:8', 'max:255']
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login')->with('status','Registration successfull! Please Login');
    }
}
