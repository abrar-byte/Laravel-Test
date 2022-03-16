<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\AnggotaOrganisasi;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Arr;

class AdminAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        return view('dashboard.anggotas.index',[
            'anggotas' => Anggota::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $position=['Ketua','Staf','Anggota'];
        return view('dashboard.anggotas.create',[
            'anggotas'=>Anggota::all(),
            'organisasis' => Organisasi::all(),
            'positions'=>$position
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
            'name' => 'required|max:255',
            'slug' => 'required|unique:anggotas',
            'height' => 'required|numeric|max:250',
            'weight' => 'required|numeric|max:250',
            'number' => 'required|numeric|unique:anggotas',

        ]);     
        Anggota::create($validatedData); 
        return redirect('/dashboard/anggotas')->with('success','New Anggota has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        $position=['Ketua','Staf','Anggota'];
        return view('dashboard.anggotas.edit', [
            'anggota' => $anggota,
            'organisasis' => Organisasi::all(),
            'positions'=>$position

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        $rules =([
            'name' => 'required|max:255',
            'height' => 'required|max:100',
            'weight' => 'required|max:100',
            'number' => 'required|numeric',

        ]);

        $validatedData = $request->validate($rules);

        $pivotData=$request->validate([            
            'organisasi_id'=>'required',
            'position'=> 'required',

        ]) ;   
        $pivotData = array_merge( $pivotData , ['anggota_id'=> $anggota->id] ) ;
        

        $organisasi2=Organisasi::findOrFail($pivotData['organisasi_id']);
        if($request->slug != $anggota->slug){
        $rules['slug'] = 'required|unique:anggotas';
        }
        $validatedData = $request->validate($rules);  

        // ketika organisasi belum ditambahkan
        if(!$anggota->organisasi->count()){
        AnggotaOrganisasi::where('anggota_id',$anggota->id)->create($pivotData);

        Anggota::where('id', $anggota->id)
        ->update($validatedData); 
        return redirect('/dashboard/anggotas')->with('success',' has been updated!');
        }

        // ketika organisasi sudah ditambahkan
        if ($anggota->organisasi->count()) {
            // pengecekan cabang olahraga ketika menambahkan organisasi
            $collection= $anggota->organisasi;
            $lastId = $collection->map(function($item, $key) {
            return $item->id;
              });
             $organisasi1=Organisasi::findOrFail($lastId[count($lastId)-1]);
        
            if ($organisasi1->id === $organisasi2->id) {
            return abort(403,'Tidak bisa menambahkan organisasi yang sama');
            }
            if (  $anggota->organisasi->count() && $organisasi1->olahraga_id === $organisasi2->olahraga_id) {
                AnggotaOrganisasi::where('anggota_id',$anggota->id)->create($pivotData);

                Anggota::where('id', $anggota->id)
                ->update($validatedData); 
                return redirect('/dashboard/anggotas')->with('success','Anggota has been updated!');
            } else {
                return abort(403,'Cabang Olahraga Organisasi Harus Sama');
            }
           
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
    
        $anggota= Anggota::findOrFail($id);
        $anggota->delete();
        
        // return redirect('/');
        // $organisasi->id->delete();
        // organisasi::destroy($organisasi->id); 
        return redirect('/dashboard/anggotas')->with('success','anggota been deleted!');
    }

    public function checkSlug(Request $request)
    {
 
        $slug = SlugService::createSlug(Anggota::class,'slug',$request->name);
        return response()->json(['slug'=>$slug]);

    }
}
