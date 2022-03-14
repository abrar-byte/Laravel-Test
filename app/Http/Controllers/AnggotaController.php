<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use App\Models\Anggota;
use App\Models\Organisasi;

class AnggotaController extends Controller
{
    public function index(){
   
        $title='';
        if(request('organisasi')){
           $organisasi = Organisasi::firstWhere('slug',request('organisasi'));
            $title = ' in ' .$organisasi->name;
        }
       

        return view ('anggotas',
        [
            "title" => "Semua Anggota"  .  $title,
            "active" => 'anggotas',
            
        
            "anggotas" => Anggota::latest()->filter(request(['search','organisasi']))->paginate(7)->withQueryString()

        ]);
    }

  
 
}
