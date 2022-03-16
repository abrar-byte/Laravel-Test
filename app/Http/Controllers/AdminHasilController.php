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
            'result' => 'required',
            

        ]);
        $jadwal=Jadwal::findOrFail($validatedData['jadwal_id'] );
        if($validatedData['jadwal_id'] === (string)$jadwal->id){
            return abort(403,'Jadwal Acara yang Kamu Pilih Sudah Ada Hasilnya');
        }

       
     
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
        $coba=AnggotaHasil::where('hasil_id',$hasil->id);
 
// $filtered = $collection->filter(function ($value, $key) {
//     return $value ;
// });
 
// $filtered->all();
// $filteres=AnggotaHasil::whereHas('hasil_id',function($query) use($user_ids){
//     $query->where('users.id',$user_ids[0]);
// });
        return view('dashboard.hasils.edit', [
            'hasil'=>$hasil,
            'jadwals'=>Jadwal::all(),
            'anggotas'=>Anggota::all(),
            // 'filters'=>$filtered
            'coba'=>$coba

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

        $anggota2=Anggota::findOrFail($pivotData['anggota_id']);
        $collection= $anggota2->organisasi;
            $idx = $collection->map(function($item, $key) {
            return $item->id;
              });
             $organisasi2=Organisasi::findOrFail($idx[count($idx)-1]);
  

        if(!$hasil->anggota->count()){

            AnggotaHasil::where('hasil_id',$hasil->id)->create($pivotData);
    
      
        Hasil::where('id', $hasil->id)
        ->update($validatedData); 
        return redirect('/dashboard/hasils')->with('success',' has been updated!');
            }

        if($hasil->anggota->count()){
            $collection= $hasil->anggota;
            $lastId = $collection->map(function($item, $key) {
            return $item->id;
            });
       
            $anggota1=Anggota::findOrFail($lastId[count($lastId)-1]);

            $collection= $anggota1->organisasi;
            $id = $collection->map(function($item, $key) {
            return $item->id;
              });
             $organisasi1=Organisasi::findOrFail($id[count($id)-1]);
        
            //  return dd($organisasi1->id,$organisasi2->id);
            if ($organisasi1->id !== $organisasi2->id) {
                return abort(403,'Anggota yang anda tambahkan tidak termasuk dalam organisasi ini');
            }
            $currentAnggota=AnggotaHasil::where('anggota_id',$anggota2->id);
            // return dd($currentAnggota);
            if ($anggota1->id === $anggota2->id) {
                return abort(403,'Anggota yang anda tambahkan sama');
            }
            AnggotaHasil::where('hasil_id',$hasil->id)->create($pivotData);
    
      
            Hasil::where('id', $hasil->id)
            ->update($validatedData); 
            return redirect('/dashboard/hasils')->with('success',' has been updated!');

        }
      
       
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
        return redirect('/dashboard/hasils')->with('success','organisasi has been deleted!');
    }

}
