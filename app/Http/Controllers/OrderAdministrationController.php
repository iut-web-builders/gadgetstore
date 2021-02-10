<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderAdministrationController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:mod','approval']);
    }

    public function showOrders(){
        $orders= DB::table('product_user')->select('*')->get();
        $mainOrders= DB::table('main_product_user')->select('*')->get();
        return view('mod/operations/orders',compact('orders','mainOrders'));

    }
}

