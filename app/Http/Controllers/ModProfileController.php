<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mod');
    }

    public function home(){
        $user = auth('mod')->user();
       // dd($user);
        if ($user->profile->image==null)
            $user->profile->image = "/images/svg/noimage.svg";
        return view('mod/home',compact('user'));
    }

    protected function index()
    {
        return $this->home();
    }
}
