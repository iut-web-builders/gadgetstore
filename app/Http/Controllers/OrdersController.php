<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function checkOut(){
       // dd(\request()->request);
        $cartData = \request()->validate([
            "cart_product_id.*" => ['numeric','gt:0'],
            "cart_product_quantity.*" => ['numeric','gt:0']
        ]);
        if($cartData!=null) {
            $cartProductIDs = $cartData["cart_product_id"];
            $cartProductQuantities = $cartData["cart_product_quantity"];
            $cartData = $this->mergeIntoObjectArray($cartProductIDs, $cartProductQuantities);


            $user = auth()->user();
            foreach ($cartData as $cartDatum) {
                if(!$user->orders->contains($cartDatum['product'])) {
                    $user->orders()->attach($cartDatum['product'], [
                        'quantity' => $cartDatum['quantity'],
                    ]);

                }
                else
                {
                    $pivot = auth()->user()->orders()->where('product_id',$cartDatum['product'])->first()->pivot;
                    $pivot['quantity']+= $cartDatum['quantity'];
                    $pivot->save();
                }
                $user->cart->products()->detach($cartDatum['product']);
            }
        }

        return redirect('/orders/show');
    }

    public function show(){
        $orders = auth()->user()->orders()->first()->pivot->get();
        return view('orders/show',compact('orders'));
    }



    protected function mergeIntoObjectArray( $cartProduct,$cartProductQuantity){
        $arrayCount = count($cartProductQuantity);
        $cartData = array();
        if(count($cartProduct)!=$arrayCount){
            return null;
        }
        for($i = 0; $i<$arrayCount;$i++){
            $cardDatum['product'] = $cartProduct[$i];
            $cardDatum['quantity']=$cartProductQuantity[$i];
            array_push($cartData,$cardDatum);
        }

        return $cartData;
    }


}
