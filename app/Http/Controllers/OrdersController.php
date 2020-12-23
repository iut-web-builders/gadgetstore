<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{
    function checkOut(){
        dd(\request()->request);
        $user = auth()->user();
        $cart = $user->cart;
        $products = $cart->products;
        foreach ($products as $product){
            $user->orders()->attach($product['id']);
            $cart->products()->detatch($product['id']);
        }

    }
}
