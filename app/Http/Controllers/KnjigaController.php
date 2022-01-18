<?php

namespace App\Http\Controllers;

use App\Http\Resources\KnjigaCollection;
use App\Http\Resources\KnjigaResource;
use App\Models\Knjiga;
use App\Models\Pozajmica;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KnjigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knjige=Knjiga::all();
        return new KnjigaCollection($knjige);
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
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:100',
            'pisac' => 'required|string|max:100',
            'zanr' => 'required|string|max:100',
            'opis' => 'required|string|max:100',
            'datumIzdavanja' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $knjiga = Knjiga::create([
            'naziv' => $request->naziv,
            'pisac' => $request->pisac,
            'zanr' => $request->zanr,
            'opis' => $request->opis,
            'datumIzdavanja' => $request->datumIzdavanja
        ]);

        return response()->json(['Knjiga uspesno sacuvana.', new KnjigaResource($knjiga)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function show(Knjiga $knjiga)
    {
        return new KnjigaResource($knjiga);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function edit(Knjiga $knjiga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Knjiga $knjiga)
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:100',
            'pisac' => 'required|string|max:100',
            'zanr' => 'required|string|max:100',
            'opis' => 'required|string|max:100',
            'datumIzdavanja' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(),422);
        }

        $knjiga->naziv = $request->naziv;
        $knjiga->pisac = $request->pisac;
        $knjiga->zanr = $request->zanr;
        $knjiga->datumIzdavanja = $request->datumIzdavanja;
        $knjiga->opis = $request->opis;
        $knjiga->save();

        return response()->json(['Knjiga uspesno azurirana.', new KnjigaResource($knjiga)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Knjiga  $knjiga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Knjiga $knjiga)
    {
        $knjiga->delete();
        return response()->json('Uspesno obrisana knjiga.');
    }
}
