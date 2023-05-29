<?php

namespace App\Http\Controllers;

use App\Models\SampahPlastik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SampahPlastikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SampahPlastik::orderBy('name','asc')->get();
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

        $data = new SampahPlastik;
        $data->name = $request->name;
        $data->type = $request->type;
        $data->price_kg = $kg;
        $data->price_gram = $gram;
        $data->stock = 0;
        if ($request->image == '') {
            $data->photo = 'icon-sampah.png';
            $data->save();
            toast('Data sampah plastik berhasil disimpan','success');
            return redirect()->route('sampah-plastik.index')->with('display', true);
        } else {
            $img = $request->file('image');
            $img_file = time()."_".$img->getClientOriginalName();
            $dir_img = 'assets/img';
            $img->move($dir_img,$img_file);
            $data->photo = $img_file;
            $data->save();
            toast('Data sampah plastik berhasil disimpan','success');
            return redirect()->route('sampah-plastik.index')->with('display', true);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SampahPlastik  $sampahPlastik
     * @return \Illuminate\Http\Response
     */
    public function show(SampahPlastik $sampahPlastik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SampahPlastik  $sampahPlastik
     * @return \Illuminate\Http\Response
     */
    public function edit(SampahPlastik $sampahPlastik)
    {
        return view('page', compact('sampahPlastik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SampahPlastik  $sampahPlastik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SampahPlastik $sampahPlastik)
    {
        $kg = ($request->price_kg == '') ? 0 : $request->price_kg ; 
        $gram = ($request->price_gram == '') ? 0 : $request->price_gram ; 
        
        $data = SampahPlastik::find($sampahPlastik->id);
        $data->name = $request->name;
        $data->type = $request->type;
        $data->price_kg = $kg;
        $data->price_gram = $gram;
        if ($request->hasfile('image')) {
            if ($data->photo != '' && $data->photo != 'icon-sampah.png') {
                $img_prev = $request->img_prev;
                unlink('assets/img'.$img_prev);
            }

            $img = $request->file('image');
            $img_file = time()."_".$img->getClientOriginalName();
            $dir_img = 'assets/img';
            $img->move($dir_img,$img_file);

            $data->photo = $img_file;
            $data->update();
            toast('Data sampah plastik berhasil diubah','success');
            return redirect()->back();
        }else{
            $data->update();
            toast('Data sampah plastik berhasil diubah','success');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SampahPlastik  $sampahPlastik
     * @return \Illuminate\Http\Response
     */
    public function destroy(SampahPlastik $sampahPlastik)
    {
        //
    }

    public function delete($id){
        // Delete Transaksi
        SampahPlastik::find($id)->delete();
        toast('data terhapus','success');
        return redirect()->back();
    }
}
