<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function __construct(Request $request)
    {

    }


    public function index(Request $request)
    {
        var_dump('ok2');
    }


}
