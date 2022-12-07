<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class GamePreviewController extends Controller
{

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
       //
    }

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('game/ready-to-game');
    }


}
