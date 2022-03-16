<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\AnggotaOrganisasi;
use App\Models\Organisasi;
use Illuminate\Http\Request;

class AnggotaOrganisasiController extends Controller
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

        return view('dashboard.pivotAnggota.index',[
            'pivots' => AnggotaOrganisasi::all(),

            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.pivotAnggota.create',[
            'anggotas' => Anggota::all(),
            'organisasis' => Organisasi::all(),

            
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
            'anggota_id' => 'required',
            'position' => 'required',
        ]);

      

        AnggotaOrganisasi::create($validatedData); 
        return redirect('/dashboard/pivotAnggota')->with('success','New Anggota has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggotaOrganisasi  $anggotaOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function show(AnggotaOrganisasi $anggotaOrganisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggotaOrganisasi  $anggotaOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(AnggotaOrganisasi $anggotaOrganisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AnggotaOrganisasi  $anggotaOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AnggotaOrganisasi $anggotaOrganisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggotaOrganisasi  $anggotaOrganisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnggotaOrganisasi $anggotaOrganisasi)
    {
        //
    }
}
