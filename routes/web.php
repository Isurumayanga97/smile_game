<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();
//Auth::routes(['register' => false]);


Route::match(['get', 'post'], '/', [LoginController::class, 'login']);
Route::get('sign-up',[RegisterController::class, 'signUp']);
Route::post('user-store',[RegisterController::class, 'create']);

Route::get('game-board', function (Request $request) {
    return view('game/game-board');
});

Route::get('/ready-to-game', function (Request $request) {
    return view('game/ready-to-game');
});

Route::get('leader-board', function (Request $request) {
    return view('game/leader-board');
});

Route::get('settings', function (Request $request) {
    return view('game/setting');
});

Route::get('spinner', function (Request $request) {
    return view('common/spinner');
});



