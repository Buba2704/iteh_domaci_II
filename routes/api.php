<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\ClanController;
use App\Http\Controllers\ClanPozajmicaController;
use App\Http\Controllers\KnjigaController;
use App\Http\Controllers\PozajmicaController;
use App\Models\Knjiga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/profile', function(Request $request) {
        return auth()->user();
    });

    Route::resource('knjiga',KnjigaController::class)->only(['update','store','destroy']);
    Route::resource('clan',ClanController::class)->only(['update','store','destroy']);
    Route::resource('pozajmica',PozajmicaController::class)->only(['update','store','destroy']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
