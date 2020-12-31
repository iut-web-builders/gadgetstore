<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Mod;
use App\Models\ModProfile;
use App\Models\Profile;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
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
        $this->middleware('guest:mod');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {


        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $this->createAssociatedTablesWithUser($user);

        return  $user;
    }

    public function showModRegistrationForm()
    {
        return view('auth.register', ['url' => 'mod']);
    }



    protected function createMod(Request $request )
    {
        $this->validator($request->all())->validate();
        $mod = Mod::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),

        ]);
        $modProfile = new ModProfile();
        $modProfile['mod_id'] = $mod['id'];
        $modProfile->save();



        return redirect()->intended('login/mod');
    }

    /**
     * @param User $user
     */
    protected function createAssociatedTablesWithUser(User $user): void
    {
        $this->createProfile($user);
        $this->createCart($user);
    }

    /**
     * @param User $user
     */
    protected function createProfile(User $user): void
    {
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
    }

    /**
     * @param User $user
     */
    protected function createCart(User $user): void
    {
        $cart = new Cart();
        $cart['id'] = $user->id;
        $cart->save();
    }


}
