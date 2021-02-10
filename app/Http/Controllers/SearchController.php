<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    function makeSearch(Request $request){
       $data = $request->validate([
           'searchValue'=>['max:64'],
       ]);

       $mainProducts=DB::table('main_products')->select('*')->where('name','like','%'.$data['searchValue'].'%')->get();
       $products=DB::table('products')->select('*')->where('name','like','%'.$data['searchValue'].'%')->get();
       return view('search/show',compact('mainProducts','products'));
    }
}
