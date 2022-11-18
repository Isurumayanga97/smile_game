<?php

use App\Http\Controllers\API\GameController;
use App\Http\Controllers\Auth\RegisterController;
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


//Route::post('register', [RegisterController::class,'create']);
//
//Route::get('games-board', function (Request $request) {
//
//
////    return view('game/game-board');
//
//});
//
//Route::get('games-board', [GameController::class,'index']);
