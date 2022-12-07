<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserAttempt;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function changeUserPassword(Request $request)
    {

        try {
            $data = $request->all();
            $old_pw_db = User::select('password')->where('id', Auth::id())->get();
            $old_pw_resp = $data['old_password'];

            if (password_verify($old_pw_resp, $old_pw_db[0]->password)) {
                $new_hash_pw = app('hash')->make($data['new_password']);
                DB::table('users')->where('id', Auth::id())->update(['password' => $new_hash_pw]);
                $request->session()->flash('msg', array('Password Change!', 'Your Password Successfully!'));
            } else {
                $request->session()->flash('errMsg', array('Password Change Failed!', 'Your Current Password Incorrect!'));
            }
            return redirect('/settings');
        } catch (\Exception $e) {
            return redirect()->back();
        }


    }

    /**
     * @return Application|Factory|View
     */
    public function loadLeaderboard()
    {
        $users = User::all();
        $leaderBoard = [];

        for ($x = 0; $x < count($users); $x++) {
            $userAttemptCount = UserAttempt::where('fk_attempt_userId', '=', $users[$x]['id'])->count();
            $userResponse = User::find($users[$x]['id']);
            //point calculation
            if ($userAttemptCount == 0) {
                $userAttemptCount = 1;
            }
            $actualPont = ($userResponse->point / $userAttemptCount) * 100;
            $playerData = [
                'name' => $userResponse->name,
                'email' => $userResponse->email,
                'point' => round($actualPont),
                'image' => $userResponse->image
            ];
            $leaderBoard[] = $playerData;
        }

        //sort array to point descending order
        usort($leaderBoard, function ($a, $b) {
            return strcmp($b['point'], $a['point']);
        });

        $gameDetails = User::with('attempt', 'bonus')->find(Auth::id());

        return view('game/leader-board', ['data' => $leaderBoard, 'gameDetails' => $gameDetails]);
    }

    /**
     * @return Application|Factory|View
     */
    public function settings()
    {
        return view('game/setting');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function changeMode(Request $request)
    {
        $data = $request->all();
        $user = User::find($data['userId']);

        if ($data['mode'] == 1) {
            error_log('--1--');
            $user->mode = 'EASY';
        } elseif ($data['mode'] ==2) {
            error_log('--2--');
            $user->mode = 'MEDIUM';
        } else {
            error_log('--3--');
            $user->mode = 'HARD';
        }

        $user->save();
        return response()->json($user);
    }


}
