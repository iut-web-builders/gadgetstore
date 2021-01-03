<?php

namespace App\Http\Controllers;

use App\Models\MainProduct;
use Illuminate\Http\Request;

class MainCartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }





    public function addToCart(MainProduct $product){
        $cart =  auth()->user()->mainCart;

        if(!$cart->products->contains($product['id']))
            $cart->products()->attach($product['id']);
        return redirect('main/products/'.$product['id']);
    }

    public function removeFromCart(MainProduct $product){
        $cart =  auth()->user()->mainCart;
        if($cart->products->contains($product['id']))
            $cart->products()->detach($product['id']);
        return redirect()->back();
    }
}
