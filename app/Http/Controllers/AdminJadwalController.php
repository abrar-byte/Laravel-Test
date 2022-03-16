<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class AdminJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $this->authorize('admin');

        return view('dashboard.jadwals.index',   [
            'jadwals' => Jadwal::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prioritas=['wajib','tidak wajib','hanya staff'];
        return view('dashboard.jadwals.create',   [
            'organisasis' => Organisasi::all(),
            'prioritas'=> $prioritas
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
            'organisasi_id' => 'required',
            'name' => 'required',
            'date' => 'required|after:yesterday',
            'time' => 'required',
            'desc' => 'required',

            'priority'=>'required'
            
        ]);
        
   
        Jadwal::create($validatedData); 
        return redirect('/dashboard/jadwals')->with('success','New Schedule has been added');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        $prioritas=['wajib','tidak wajib','hanya staff'];
        return view('dashboard.jadwals.edit',   [
            'organisasis' => Organisasi::all(),
            'jadwal'=>$jadwal,
            'prioritas'=> $prioritas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $rules = ([
            'organisasi_id' => 'required',
            'name' => 'required',
            'date' => 'required',
            'time' => 'required',
            'desc' => 'required',

            'priority'=>'required'
            
        ]);

        $validatedData = $request->validate($rules);
        
        Jadwal::where('id', $jadwal->id)
        ->update($validatedData); 
        return redirect('/dashboard/jadwals')->with('success','Team has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jadwal= Jadwal::findOrFail($id);
        $jadwal->delete();
        
        // return redirect('/');
        // $organisasi->id->delete();
        // organisasi::destroy($organisasi->id); 
        return redirect('/dashboard/jadwals')->with('success','organisasi has been deleted!');
    }
}
