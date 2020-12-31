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
        //dd($user->profile);
        return view('mod/home',compact('user'));
    }
}
