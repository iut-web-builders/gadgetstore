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
        $user = auth()->user();
        $cartData = \request()->validate([
            "cart_product_id.*" => ['numeric','gt:0'],
            "cart_product_quantity.*" => ['numeric','gt:0']
        ]);
        $returnLocation = redirect()->back();
        if($cartData == null) return  $returnLocation;
        $cartData = $this->createDataFromInput($cartData);

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

        return $returnLocation;
    }

    public function show(){
        $user = auth()->user();
        $orderedProducts = [];
        $orderedMainProducts = [];
        if($user->orders()->first()!=null)
          $orderedProducts = auth()->user()->orders;
        if($user->mainOrders->first()!=null)
            $orderedMainProducts = auth()->user()->mainOrders;
        return view('orders/show',compact('orderedProducts','orderedMainProducts'));
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

    /**
     * @param array $cartData
     * @return array|null
     */
    protected function createDataFromInput(array $cartData): ?array
    {
        $cartProductIDs = $cartData["cart_product_id"];
        $cartProductQuantities = $cartData["cart_product_quantity"];
        $cartData = $this->mergeIntoObjectArray($cartProductIDs, $cartProductQuantities);
        return $cartData;
    }



    function mainCheckOut(){
        $returnLocation = redirect()->back();
        $user = auth()->user();
        $cartData = \request()->validate([
            "cart_product_id.*" => ['numeric','gt:0'],
            "cart_product_quantity.*" => ['numeric','gt:0']
        ]);
        if($cartData == null) return  $returnLocation;

        $cartData = $this->createDataFromInput($cartData);

        foreach ($cartData as $cartDatum) {
            if(!$user->mainOrders->contains($cartDatum['product'])) {
                $user->mainOrders()->attach($cartDatum['product'], [
                    'quantity' => $cartDatum['quantity'],
                ]);

            }
            else
            {
                $pivot = auth()->user()->mainOrders()->where('main_product_id',$cartDatum['product'])->first()->pivot;
                $pivot['quantity']+= $cartDatum['quantity'];
                $pivot->save();
            }
            $user->mainCart->products()->detach($cartDatum['product']);
        }

        return $returnLocation;
    }


}
