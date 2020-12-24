<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function myProducts(){
        $products = auth()->user()->products;
        return view('settings/myProducts',compact('products'));
    }
}
