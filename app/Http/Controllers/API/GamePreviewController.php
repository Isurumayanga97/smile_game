<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class GamePreviewController extends Controller
{

    public function __construct(Request $request)
    {
       //
    }

    public function index()
    {
        return view('game/ready-to-game');
    }


}
