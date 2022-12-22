<?php

namespace App\Http\Controllers;

use App\Models\SampahCacah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampahCacahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SampahCacah::orderBy('name','asc')->get();
        return view('page', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kg = ($request->price_kg == '') ? 0 : $request->price_kg ; 
        $gram = ($request->price_gram == '') ? 0 : $request->price_gram ; 
        $pcs = ($request->price_pcs == '') ? 0 : $request->price_pcs ; 

        $data = new SampahCacah();
        $data->name = $request->name;
        $data->price_kg = $kg;
        $data->price_gram = $gram;
        $data->price_pcs = $pcs;
        $data->stock = 0;
        $data->save();
        toast('Data sampah cacah berhasil disimpan','success');
        return redirect()->route('sampah-cacah.index')->with('display', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SampahCacah  $sampahCacah
     * @return \Illuminate\Http\Response
     */
    public function show(SampahCacah $sampahCacah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SampahCacah  $sampahCacah
     * @return \Illuminate\Http\Response
     */
    public function edit(SampahCacah $sampahCacah)
    {
        return view('page', compact('sampahCacah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SampahCacah  $sampahCacah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SampahCacah $sampahCacah)
    {
        $kg = ($request->price_kg == '') ? 0 : $request->price_kg ; 
        $gram = ($request->price_gram == '') ? 0 : $request->price_gram ; 
        $pcs = ($request->price_pcs == '') ? 0 : $request->price_pcs ;
        
        $data = SampahCacah::find($sampahCacah->id);
        $data->name = $request->name;
        $data->price_kg = $kg;
        $data->price_gram = $gram;
        $data->price_pcs = $pcs;
        $data->update();
        toast('Data sampah cacah berhasil diubah','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SampahCacah  $sampahCacah
     * @return \Illuminate\Http\Response
     */
    public function destroy(SampahCacah $sampahCacah)
    {
        //
    }
}
