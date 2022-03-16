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
            // 'organisasi_id' => 'required',
            'height' => 'required|numeric|max:200',
            'weight' => 'required|numeric|max:200',
            // 'position' => 'required|max:100',
            'number' => 'required|numeric|unique:anggotas',

        ]);
            

        $fakeId= Anggota::latest('id')->first();
        // 'anggota_id' => $fakeId->id + 1,
        $pivotData=$request->validate([
            'organisasi_id'=> 'required',
            'position'=> 'required',

        ]) ;   
        $pivotData = array_merge( $pivotData , ['anggota_id' => $fakeId->id + 1] ) ;
        // return dd($pivotData); 
        AnggotaOrganisasi::create($pivotData);

        //  return response()->json($res);
        // if($validatedData['number'] === $validatedData['away_team_id']){
        //     return abort(403,'Team tidak boleh sama');
        // }

        // if($request->file('image')){
        //     $validatedData['image'] = $request->file('image')->store('post-images');
        // };

        // $validatedData['user_id'] = auth()->user()->id;
     
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
        // return view('dashboard.anggotas.show',[
        //     'anggota' => $anggota
        // ]);
        // ddd($anggota,'organisasi');
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
            // 'organisasi_id' => 'required',
            'height' => 'required|max:100',
            'weight' => 'required|max:100',
            // 'position' => 'required|max:100',
            'number' => 'required|numeric',

        ]);

        

        if($request->slug != $anggota->slug){
        $rules['slug'] = 'required|unique:anggotas';
        }

        $validatedData = $request->validate($rules);

      
        // $validatedData['user_id'] = auth()->user()->id;
      
        Anggota::where('id', $anggota->id)
        ->update($validatedData); 
        return redirect('/dashboard/anggotas')->with('success','Anggota has been updated!');
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
        return redirect('/dashboard/anggotas')->with('success','organisasi has been deleted!');
    }

    public function checkSlug(Request $request)
    {
 
        $slug = SlugService::createSlug(Anggota::class,'slug',$request->name);
        return response()->json(['slug'=>$slug]);

    }
}
