<?php

namespace App\Http\Controllers;

use App\Models\Pemilahan;
use App\Http\Controllers\Controller;
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
        //
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
        //
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
