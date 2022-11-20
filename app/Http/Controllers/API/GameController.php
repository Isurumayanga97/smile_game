<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\Game;
use App\Models\User;
use App\Models\UserAttempt;
use App\Services\GuzzleService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{

    /**
     * Manage user authentication
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        //
    }

    /**
     * Load game and call game details
     * Check user attempt
     * to Create bonus
     * @param Request $request
     * @return Application|Factory|View|RedirectResponse
     */
    public function index(Request $request)
    {
        try {
            $apiService = new GuzzleService();
            $apiData = $apiService->callSmileAPI();

            DB::beginTransaction();
            $gameDetails = $this->storeGameDetails(Auth::id());
            $bonusDetails = $this->checkUserBonus(Auth::id());
            DB::commit();

            return view('game/game-board', ['gameData' => $apiData, 'gameDetails' => $gameDetails, 'bonus' => $bonusDetails]);
        } catch (\Exception|GuzzleException $exception) {
            return redirect()->back();
        }
    }

    /**
     * Store game details related to user
     * @param $userId
     * @return RedirectResponse
     */
    public function storeGameDetails($userId)
    {
        try {
            DB::beginTransaction();
            //store game details
            $gameDetails = Game::create([
                'fk_userID' => $userId
            ]);

            //store attempt
            UserAttempt::create([
                'fk_attempt_userId' => $userId,
                'fk_attempt_gameId' => $gameDetails->id,
                'attempt' => 1
            ]);

            DB::commit();
            return $gameDetails->id;
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * Store user attempt
     * @param Request $request
     * @return JsonResponse|RedirectResponse
     */
    public function storeAttempt(Request $request)
    {
        $data = array('userId' => $request->post('fk_attempt_userId'),
            'gameId' => $request->post('fk_attempt_gameId'));

        try {
            $userAttemptObj = new UserAttempt();
            $currentAttempt = $userAttemptObj->checkUserAttempt($data);

            if ($currentAttempt < 4) {
                UserAttempt::updateOrInsert([
                    'fk_attempt_userId' => $request->post('fk_attempt_userId'),
                    'fk_attempt_gameId' => $request->post('fk_attempt_gameId')],
                    ['attempt' => $currentAttempt]);
                return response()->json(['msg' => 'Attempt', 'attempt' => 3 - $currentAttempt], 200);
            }
            return response()->json(['msg' => 'Not attempt', 'attempt' => 0], 200);
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return false|RedirectResponse|int
     */
    public function checkUserBonus($id)
    {
        try {
            $userAttemptResponse = UserAttempt::where('fk_attempt_userId', '=', $id)->where('check_attempt', '=', 0)
                ->orderBy('id', 'DESC')->get();

            $bonus = false;
            for ($x = 0; $x < 4; $x++) {
                if ($userAttemptResponse[$x]->attempt !== '1') {
                    $bonus = false;
                    break;
                } elseif ($x == 3) {
                    $bonus = true;
                }
            }

            $bonusObj = new Bonus();
            if ($bonus) {
                return $bonusObj->storeBonus($id);
            } else {
                return false;
            }
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function claimBonus($id)
    {
        $bonusObj = new Bonus();
        $currentBonusValue = $bonusObj->claimUserBonus($id);
        if ($currentBonusValue) {
            return response()->json(['msg' => 'Claimed'], 200);
        } else {
            return response()->json(['msg' => 'Not Claimed'], 200);
        }
    }

    /**
     * @param $id
     * @return JsonResponse|RedirectResponse
     */
    public function refreshGame($id)
    {
        try {
            $apiService = new GuzzleService();
            $apiData = $apiService->callSmileAPI();
            $gameDetails = $this->storeGameDetails($id);
            $bonusDetails = $this->checkUserBonus($id);
            return response()->json(['gameData' => $apiData, 'gameDetails' => $gameDetails, 'bonus' => $bonusDetails], 200);
        } catch (\Exception|GuzzleException $e) {
            return redirect()->back();
        }
    }

    /**
     * @param $id
     * @return JsonResponse|RedirectResponse
     */
    public function submitAnswer($id)
    {
        try {
            $apiService = new GuzzleService();
            $user = new User();
            $apiData = $apiService->callSmileAPI();

            DB::beginTransaction();
            $gameDetails = $this->storeGameDetails($id);
            $bonusDetails = $this->checkUserBonus($id);
            $user->storeUserPoint($id);
            DB::commit();

            return response()->json(['gameData' => $apiData, 'gameDetails' => $gameDetails, 'bonus' => $bonusDetails], 200);
        } catch (\Exception|GuzzleException $e) {
            return redirect()->back();
        }
    }


}
