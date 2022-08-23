<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view('report',[
            "title" => "Daftar Pegawai",
            "pegawais" => pegawai::all()
        ]);
    }
}
