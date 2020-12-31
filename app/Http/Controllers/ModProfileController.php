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

        return view('mod/home');
    }
}
