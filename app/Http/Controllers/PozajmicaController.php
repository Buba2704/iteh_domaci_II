<?php

namespace App\Http\Controllers;

use App\Http\Resources\PozajmicaCollection;
use App\Models\Pozajmica;
use Illuminate\Http\Request;

class PozajmicaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pozajmice=Pozajmica::all();
        return new PozajmicaCollection($pozajmice);
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
     * @param  \App\Models\Pozajmica  $pozajmica
     * @return \Illuminate\Http\Response
     */
    public function show(Pozajmica $pozajmica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pozajmica  $pozajmica
     * @return \Illuminate\Http\Response
     */
    public function edit(Pozajmica $pozajmica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pozajmica  $pozajmica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pozajmica $pozajmica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pozajmica  $pozajmica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pozajmica $pozajmica)
    {
        //
    }
}
