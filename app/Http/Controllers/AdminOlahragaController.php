<?php

namespace App\Http\Controllers;

use App\Models\Olahraga;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class AdminOlahragaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');

        return view('dashboard.olahragas.index',   [
            'olahragas' => Olahraga::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.olahragas.create');
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
            'slug' => 'required'
        ]);

      
     

        Olahraga::create($validatedData); 
        return redirect('/dashboard/olahragas')->with('success','New Cabang Olahraga has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function show(Olahraga $olahraga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function edit(Olahraga $olahraga)
    {
        return view('dashboard.olahragas.edit', [
            'olahraga' => $olahraga,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Olahraga $olahraga)
    {
        $rules =([
            'name' => 'required|max:255',            
            

        ]);

        

        if($request->slug != $olahraga->slug){
        $rules['slug'] = 'required|unique:olahragas';
        }

        $validatedData = $request->validate($rules);

        
        Olahraga::where('id', $olahraga->id)
        ->update($validatedData); 
        return redirect('/dashboard/olahragas')->with('success','Cabang Olahraga has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Olahraga  $olahraga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $olahraga= Olahraga::findOrFail($id);
        // $olahraga->organisasi()->delete();
        $olahraga->delete();
        return redirect('/dashboard/olahragas')->with('success','Cabang Olahraga has been deleted!');
    }

    public function checkSlug(Request $request)
    {
  
        $slug = SlugService::createSlug(Olahraga::class,'slug',$request->name);
        return response()->json(['slug'=>$slug]);

    }
}
