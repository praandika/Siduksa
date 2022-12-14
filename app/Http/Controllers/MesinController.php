<?php

namespace App\Http\Controllers;

use App\Models\Mesin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MesinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mesin::orderBy('name','asc')->get();
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
        $data = new Mesin;
        $data->name = $request->name;
        $data->capacity = $request->capacity;
        $data->status = 'offline';
        $data->save();
        toast('Data mesin berhasil disimpan','success');
        return redirect()->route('mesin.index')->with('display', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function show(Mesin $mesin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function edit(Mesin $mesin)
    {
        return view('page', compact('mesin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mesin $mesin)
    {
        $data = Mesin::find($mesin->id);
        $data->name = $request->name;
        $data->capacity = $request->capacity;
        $data->update();
        toast('Data mesin berhasil diubah','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mesin  $mesin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mesin $mesin)
    {
        //
    }

    public function delete($id){
        Mesin::find($id)->delete();
        toast('Data mesin terhapus','success');
        return redirect()->back();
    }
}
