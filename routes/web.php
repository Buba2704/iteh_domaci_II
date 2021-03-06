<?php

use App\Http\Controllers\ClanController;
use App\Http\Controllers\ClanPozajmicaController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\PozajmicaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "Pocetna strana";
});

Route::resource('knjiga',KnjigaController::class)->only(['index','show']);
Route::resource('clan',ClanController::class)->only(['index','show']);
Route::resource('pozajmica',PozajmicaController::class)->only(['index','show']);
Route::resource('clan.pozajmice',ClanPozajmicaController::class)->only(['index']);
