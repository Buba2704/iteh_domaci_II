<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClanResource;
use App\Http\Resources\PozajmicaCollection;
use App\Http\Resources\PozajmicaResource;
use App\Models\Clan;
use App\Models\Pozajmica;
use App\Rules\PostojiClan;
use App\Rules\PostojiKnjiga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'datum' => 'required|date',
            'knjiga_id' => ['required','integer', new PostojiKnjiga()],
            'clan_id' => ['required','integer', new PostojiClan()],
            'napomena' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $pozajmica = Pozajmica::create([
            'datum' => $request->datum,
            'knjiga_id' => $request->knjiga_id,
            'clan_id' => $request->clan_id,
            'napomena' => $request->napomena
        ]);

        return response()->json(['Pozajmica uspesno sacuvana.', new PozajmicaResource($pozajmica)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pozajmica  $pozajmica
     * @return \Illuminate\Http\Response
     */
    public function show(Pozajmica $pozajmica)
    {
        return new PozajmicaResource($pozajmica);
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
        $validator = Validator::make($request->all(), [
            'datum' => 'required|date',
            'knjiga_id' => ['required','integer', new PostojiKnjiga()],
            'clan_id' => ['required','integer', new PostojiClan()],
            'napomena' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $pozajmica->datum = $request->datum;
        $pozajmica->knjiga_id = $request->knjiga_id;
        $pozajmica->clan_id = $request->clan_id;
        $pozajmica->napomena = $request->napomena;

        $pozajmica->save();

        return response()->json(['Pozajmica uspesno azurirana.', new PozajmicaResource($pozajmica)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pozajmica  $pozajmica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pozajmica $pozajmica)
    {
        $pozajmica->delete();
        return response()->json('Pozajmica uspesno obrisana.');
    }
}
