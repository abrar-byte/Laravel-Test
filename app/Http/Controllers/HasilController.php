<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;

class HasilController extends Controller
{

    public function index(){
        $hasils=Hasil::get();
        return view('/hasils',[
            'title' =>'Jadwal Acara',
        'active' => 'hasils',
            'hasils' =>$hasils
        ]);
    }

    public function show (Hasil $hasil){
        return view ('hasil',
        [
            "title" => "Single hasil",
            "active" => 'hasil',

            "hasil" => $hasil
        ]);
    }
}
