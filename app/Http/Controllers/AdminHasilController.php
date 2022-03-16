<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\AnggotaHasil;
use App\Models\AnggotaOrganisasi;
use App\Models\Hasil;
use App\Models\Jadwal;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Arr;

class AdminHasilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        return view('dashboard.hasils.index',[
            'hasils' => Hasil::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.hasils.create',[
            'jadwals'=>Jadwal::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jadwal_id' => 'required',
            'resume' => 'required',
            // 'organisasi_id' => 'required',
            'result' => 'required',
            

        ]);
            

       
     
        Hasil::create($validatedData); 
        return redirect('/dashboard/hasils')->with('success','New Anggota has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Hasil $hasil)
    {
        //
        return view('dashboard.hasils.show',[
            'hasil' => $hasil
        ]);
        // ddd($anggota,'organisasi');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hasil  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Hasil $hasil)
    {
//         $collection = Anggota::all();
//         $organisasi=AnggotaHasil::where('hasil_id',$hasil->jadwal->organisasi_id);
 
// $filtered = $collection->filter(function ($value, $key) {
//     return $value ;
// });
 
// $filtered->all();
        return view('dashboard.hasils.edit', [
            'hasil'=>$hasil,
            'jadwals'=>Jadwal::all(),
            'anggotas'=>Anggota::all(),
            // 'filters'=>$filtered

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hasil  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hasil $hasil)
    {
        $rules =([
            'jadwal_id' => 'required',
            'resume' => 'required',
            'result' => 'required',
            

        ]);
        $validatedData = $request->validate($rules);

        $pivotData=$request->validate([            
            'anggota_id'=>'required',
            'contribution'=> 'required',

        ]) ;   
        $pivotData = array_merge( $pivotData , ['hasil_id'=> $hasil->id] ) ;

      
        AnggotaHasil::where('hasil_id',$hasil->id)->create($pivotData);
    
      
        Hasil::where('id', $hasil->id)
        ->update($validatedData); 
        return redirect('/dashboard/hasils')->with('success','Anggota has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
        $anggota= Hasil::findOrFail($id);
        $anggota->delete();
        
        // return redirect('/');
        // $organisasi->id->delete();
        // organisasi::destroy($organisasi->id); 
        return redirect('/dashboard/anggotas')->with('success','organisasi has been deleted!');
    }

}
