<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    function checkOut(){
        $products = auth()->user()->cart;

    }
}
