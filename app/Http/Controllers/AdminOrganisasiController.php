<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;


class AdminOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->authorize('admin');

        return view('dashboard.organisasis.index',   [
            'organisasis' => Organisasi::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.organisasis.create',   [
            'organisasis' => Organisasi::all()
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
        // ddd($request);
        // return $request->file('image')->store('post-images');
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'slug' => 'required|unique:organisasis',
             'logo' => 'image|file|max:1024',
            'year' => 'required|max:2022',
            'address' => 'required',
            'sport' => 'required',
            

        ]);

        if($request->file('logo')){
            $validatedData['logo'] = $request->file('logo')->store('post-logos');
        };

        // $validatedData['user_id'] = auth()->user()->id;
     

        Organisasi::create($validatedData); 
        return redirect('/dashboard/organisasis')->with('success','New Team has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Organisasi $organisasi)
    {
        //
        return view('dashboard.organisasis.show',[
            'organisasi' => $organisasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Organisasi $organisasi)
    {
        //
        return view('dashboard.organisasis.edit', [
            'organisasi' => $organisasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organisasi $organisasi)
    {
        $rules =([
            'name' => 'required|max:255',            
            'logo' => 'image|file|max:1024',
            'year' => 'required|max:2022',
            'address' => 'required',
            'sport' => 'required',

        ]);

        

        if($request->slug != $organisasi->slug){
        $rules['slug'] = 'required|unique:organisasis';
        }

        $validatedData = $request->validate($rules);

        // return dd($validatedData);

        if($request->file('logo')){
            if($organisasi->logo){
                Storage::delete($organisasi->logo);
                };
            $validatedData['logo'] = $request->file('logo')->store('post-logos');
        };

      
        // $validatedData['user_id'] = auth()->user()->id;
      
        Organisasi::where('id', $organisasi->id)
        ->update($validatedData); 
        return redirect('/dashboard/organisasis')->with('success','Team has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Organisasi  $organisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $organisasi= Organisasi::findOrFail($id);
        $organisasi->delete();
        // Team::destroy($organisasi->id); 
        return redirect('/dashboard/organisasis')->with('success','Team has been deleted!');
    }

    public function checkSlug(Request $request)
    {
  
        $slug = SlugService::createSlug(Organisasi::class,'slug',$request->name);
        return response()->json(['slug'=>$slug]);

    }
}
