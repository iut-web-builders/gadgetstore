<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartsController extends Controller
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




    public function show()
    {
        $products = auth()->user()->cart->products;
        return view('carts/show',compact('products'));
    }


    public function addToCart(Product $product){
       $cart =  auth()->user()->cart;
       if(!$cart->products->contains($product['id']))
       $cart->products()->attach($product['id']);
       return redirect('/products/'.$product['id']);
    }

    public function removeFromCart(Product $product){
        $cart =  auth()->user()->cart;
        if($cart->products->contains($product['id']))
            $cart->products()->detach($product['id']);
        return redirect()->back();
    }
}
