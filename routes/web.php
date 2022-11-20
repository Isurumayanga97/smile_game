<?php

use App\Http\Controllers\API\GameController;
use App\Http\Controllers\API\GamePreviewController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();
//Auth::routes(['home' => false]);


Route::match(['get', 'post'], '/', [LoginController::class, 'login']);
Route::get('sign-up', [RegisterController::class, 'signUp']);
Route::post('user-store', [RegisterController::class, 'create']);
Route::match(['get', 'post'], '/change-password', [UserController::class, 'changeUserPassword'])->middleware('auth');
Route::get('/sign-out', function (Request $request) {
    $request->session()->flush();
    return redirect('/');
});

Route::get('ready-to-game', [GamePreviewController::class, 'index'])->middleware('auth');;
Route::get('game-board', [GameController::class, 'index'])->middleware('auth');

Route::get('leader-board', [UserController::class, 'loadLeaderboard'])->middleware('auth');

Route::get('settings', [UserController::class, 'settings'])->middleware('auth');;


//Temp
Route::get('spinner', function (Request $request) {
    return view('common/spinner');
});



