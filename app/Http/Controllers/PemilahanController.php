<?php

namespace App\Http\Controllers;

use App\Models\Pemilahan;
use App\Http\Controllers\Controller;
use App\Models\SampahPlastik;
use Illuminate\Http\Request;

class PemilahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pemilahan::orderBy('created_at', 'desc')->get();
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemilahan  $pemilahan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemilahan $pemilahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemilahan  $pemilahan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemilahan $pemilahan)
    {
        $sampahPlastik = SampahPlastik::where('type','!=','Campuran')->get();
        return view('page', compact('pemilahan','sampahPlastik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemilahan  $pemilahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemilahan $pemilahan)
    {
        if ($request->namaSampah == '' || $request->qty == '') {
            alert()->warning('Warning','Masih ada kolom kosong!');
            return redirect()->back();
        } else {
            if ($request->satuan == 'Kg') {
                $totalWeight = $request->totalWeight * 1000;
                $countWeight = $totalWeight - ($request->qty + $request->waste); //Gram
                $remainingWeight = $countWeight / 1000;
            } else {
                $totalWeight = $request->totalWeight;
                $countWeight = $totalWeight - ($request->qty + $request->waste);
                $remainingWeight = $countWeight;
            }
            
            // dd($countWeight);
    
            if ($countWeight < 0 || $request->waste < 0) {
                alert()->error('Oops...','Quantity melebihi total berat!');
                return redirect()->back();
            } else {
                if ($countWeight == 0) {
                    $status = 'Sorted';
                } else {
                    $status = 'Sorting on progress';
                }
                
                $pemilahan = Pemilahan::find($pemilahan->id);
                $pemilahan->total_weight = $remainingWeight;
                $pemilahan->status = $status;
                $pemilahan->waste_trash = $request->waste;
                $pemilahan->update();
        
                // Update Stock
                $stock = ($request->stock + $request->qty) / 1000;
                $updateStock = SampahPlastik::find($request->idSampah);
                $updateStock->stock = $stock;
                $updateStock->update();
        
                toast('Sampah berhasil dipilah');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemilahan  $pemilahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemilahan $pemilahan)
    {
        //
    }
}
