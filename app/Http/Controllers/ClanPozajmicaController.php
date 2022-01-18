<?php

namespace App\Http\Controllers;

use App\Http\Resources\PozajmicaCollection;
use App\Models\Pozajmica;
use Illuminate\Http\Request;

class ClanPozajmicaController extends Controller
{
    public function index($clan_id)
    {
        $pozajmice = Pozajmica::get()->where('clan_id',$clan_id);
        if(is_null($pozajmice)){
            return response()->json("Data not found",404);
        }
        return new PozajmicaCollection($pozajmice);
    }
}
