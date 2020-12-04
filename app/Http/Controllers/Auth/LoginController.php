<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
        $this->middleware('guest:mod')->except('logout');

    }

    public function showModLoginForm(){
        return view('auth.login', ['url' => 'mod']);
    }



    public function modLogin(Request $request){
        $this->validateRequestForm($request);

        if(Auth::guard('mod')->attempt(
            $this->getAttempt($request))){
            return redirect()->intended('/mod');
        }

        return back()->withInput($request->only('email','remember'));

    }


    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     */
    public function validateRequestForm(Request $request): void
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function getAttempt(Request $request): array
    {
        return ['email' => $request->email,
            'password' => $request->password,
            'remember_token' => $request->get('remember')
        ];
    }


}
