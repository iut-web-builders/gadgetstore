<?php

namespace App\Http\Controllers;

use App\Models\MainProduct;
use App\Models\Product;
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
            "cart_product_id.*" => ['numeric','gt:-1'],
            "cart_product_quantity.*" => ['numeric','gt:-1']
        ]);
        $returnLocation = redirect()->back();
        if($cartData == null) return  $returnLocation;
        $cartData = $this->createDataFromInput($cartData);

        foreach ($cartData as $cartDatum) {
            $cartProduct=  Product::all()->find($cartDatum['product']);
            if($cartProduct->stock==0) continue;
            if($cartProduct->stock<$cartDatum['quantity']){
                $quantity = $cartProduct->stock;
            }
            else $quantity = $cartDatum['quantity'];
            if(!$user->orders->contains($cartDatum['product'])) {
                $user->orders()->attach($cartDatum['product'], [
                    'quantity' => $quantity,
                ]);

            }
            else
            {
                $pivot = auth()->user()->orders()->where('product_id',$cartDatum['product'])->first()->pivot;
                $pivot['quantity']+= $quantity;
                $pivot->save();
            }
            $cartProduct->stock-=$quantity;
            $cartProduct->save();

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

    public function showOrderOperateView(){

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
            "cart_product_id.*" => ['numeric','gt:-1'],
            "cart_product_quantity.*" => ['numeric','gt:-1']
        ]);

        if($cartData == null) return  $returnLocation;

        $cartData = $this->createDataFromInput($cartData);


        foreach ($cartData as $cartDatum) {
            $cartProduct = MainProduct::all()->find($cartDatum['product']);
            if($cartProduct->stock==0) {continue;}
            if($cartProduct->stock<$cartDatum['quantity']){
                $quantity = $cartProduct->stock;
            }
            else $quantity = $cartDatum['quantity'];
            if(!$user->mainOrders->contains($cartDatum['product'])) {
                $user->mainOrders()->attach($cartDatum['product'], [
                    'quantity' => $quantity,
                ]);

            }
            else
            {
                $pivot = auth()->user()->mainOrders()->where('main_product_id',$cartDatum['product'])->first()->pivot;
                $pivot['quantity']+= $quantity;
                $pivot->save();
            }
            $user->mainCart->products()->detach($cartDatum['product']);
            $cartProduct->stock-=$quantity;
            $cartProduct->save();
        }

        return $returnLocation;
    }


}
