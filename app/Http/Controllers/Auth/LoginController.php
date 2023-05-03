<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            $exist = auth()->user();

            if (auth()->user()->type == 'worker') {
                return response([
                    'message' => 'Hello Our Worker, U Logged In Now!',
                    'token'   => $exist->createToken($exist->name.'-workerToken')->plainTextToken
                ],200);
            }else{
                return response([
                    'message' => 'Hello User Worker, U Logged In Now!',
                    'token'   => $exist->createToken($exist->name.'-userToken')->plainTextToken
                ],200);
            }
        }else{
            return response([
                'message' => 'Wrong Information'
            ],403);
        }

    }
}
