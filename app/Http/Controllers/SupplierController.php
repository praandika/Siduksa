<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Supplier::orderBy('name','asc')->get();
        return view('page', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $data = new Supplier;
        $data->name = $request->name;
        $data->address = $request->address;
        $data->contact = $request->contact;
        $data->email = $emailNull;
        $data->instansi = $instansiNull;
        $data->save();
        toast('Data supplier berhasil disimpan','success');
        return redirect()->route('supplier.index')->with('display', true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        return view('page', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $instansiNull = ($request->instansi == '') ? '-' : $request->instansi;
        $emailNull = ($request->email == '') ? '-' : $request->email;
        $data = Supplier::find($supplier->id);
        $data->name = $request->name;
        $data->address = $request->address;
        $data->contact = $request->contact;
        $data->email = $emailNull;
        $data->instansi = $instansiNull;
        $data->update();
        toast('Data supplier berhasil diubah','success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }

    public function delete($id){
        Supplier::find($id)->delete();
        toast('Data supplier terhapus','success');
        return redirect()->back();
    }
}
