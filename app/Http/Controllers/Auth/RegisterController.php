<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return Application|Factory|View
     */

    public function signUp()
    {
        return view('auth/register');
    }

    /**
     * @param UserStoreRequest $request
     * @return RedirectResponse
     */
    public function create(UserStoreRequest $request)
    {
        try {
            $validated = $request->validated();
            $user = new User($validated);
            $user->password = Hash::make($validated['password']);
            $user->mode = 'EASY';
            $user->save();

            return redirect('/');
        } catch (\Exception $e) {
            return redirect()->back();
        }
    }


}
