<?php

namespace App\Http\Controllers;

use App\Models\Pengepul;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengepulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pengepul::orderBy('name','asc')->get();
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
        $instansiNull = ($request->instansi == '') ? '-' : $request->instansi;
        $emailNull = ($request->email == '') ? '-' : $request->email;
        $data = new Pengepul;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->contact = $request->contact;
        $data->email = $emailNull;
        $data->instansi = $instansiNull;
        $data->save();
        toast('Data pengepul berhasil disimpan','success');
        return redirect()->route('pengepul.index')->with('display', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pengepul  $pengepul
     * @return \Illuminate\Http\Response
     */
    public function show(Pengepul $pengepul)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pengepul  $pengepul
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengepul $pengepul)
    {
        return view('page', compact('pengepul'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pengepul  $pengepul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengepul $pengepul)
    {
        $instansiNull = ($request->instansi == '') ? '-' : $request->instansi;
        $emailNull = ($request->email == '') ? '-' : $request->email;
        $data = Pengepul::find($pengepul->id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->contact = $request->contact;
        $data->email = $emailNull;
        $data->instansi = $instansiNull;
        $data->update();
        toast('Data pengepul berhasil diubah','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pengepul  $pengepul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengepul $pengepul)
    {
        //
    }

    public function delete($id){
        Pengepul::find($id)->delete();
        toast('Data pengepul terhapus','success');
        return redirect()->back();
    }
}
