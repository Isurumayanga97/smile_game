<?php

use App\Http\Controllers\API\GameController;
use App\Http\Controllers\API\UserController;
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


Route::post('store-attempt', [GameController::class,'storeAttempt']);
Route::get('claim-bonus/{id}', [GameController::class,'claimBonus']);
Route::get('refresh-games-board/{id}', [GameController::class,'refreshGame']);
Route::get('submit-answer/{id}', [GameController::class,'submitAnswer']);


//Temp
Route::post('bonus/{id}', [GameController::class,'checkUserBonus']);
Route::get('leaderboard', [UserController::class,'loadLeaderboard']);
