<?php

namespace App\Http\Controllers;

class ProfilesController extends Controller
{

    public function index()
    {
       // $follows = (auth()->user())? auth()->user()->following->contains($user->id):false;
        return view('profiles.index');
    }


}
