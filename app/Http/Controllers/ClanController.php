<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClanCollection;
use App\Http\Resources\ClanResource;
use App\Models\Clan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clanovi=Clan::all();
        return new ClanCollection($clanovi);
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
            'ime' => 'required|string|max:100',
            'prezime' => 'required|string|max:100',
            'datumRodjenja' => 'required|date',
            'adresa' => 'required',
            'brojTelefona' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $clan = Clan::create([
            'ime' => $request->ime,
            'prezime' => $request->prezime,
            'datumRodjenja' => $request->grad,
            'brojTelefona' => $request->brojTelefona,
            'adresa' => $request->adresa
        ]);

        return response()->json(['Clan uspesno sacuvan.', new ClanResource($clan)]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function show(Clan $clan)
    {

        return new ClanResource($clan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function edit(Clan $clan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clan $clan)
    {
        $validator = Validator::make($request->all(), [
            'ime' => 'required|string|max:100',
            'prezime' => 'required|string|max:100',
            'datumRodjenja' => 'required|date',
            'adresa' => 'required',
            'brojTelefona' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

             $clan->ime = $request->ime;
             $clan->prezime = $request->prezime;
             $clan->datumRodjenja = $request->grad;
             $clan->brojTelefona = $request->brojTelefona;
             $clan->adresa = $request->adresa;
       $clan->save();

        return response()->json(['Clan uspesno azuriran.', new ClanResource($clan)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clan  $clan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clan $clan)
    {
        $clan->delete();
        return response()->json('Clan uspesno izbrisan');
    }
}
