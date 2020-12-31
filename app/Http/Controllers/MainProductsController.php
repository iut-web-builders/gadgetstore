<?php

namespace App\Http\Controllers;

use App\Models\MainProduct;
use Illuminate\Http\Request;

class MainProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *N
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/mod/products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationTemplate = [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['max:255'],
            'price' => ['required', 'numeric','gte:0'],
            'brand'=> ['max:50'],
            'category'=>['max:50'],
            'image' => ['image','required'],
        ];
        $data = $request->validate($validationTemplate);
        $imagePath = request('image')->store('images','public');
        $data['image'] = $imagePath;
        $data['point'] = $data['price']/10;
        //   dd($data);

        auth('mod')->user()->products()->create($data);
        return  redirect('/mod/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainProduct  $mainProduct
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     * @param  MainProduct  $product
     * @return \View
     */
    public function show(MainProduct $product)
    {
        return view('products/show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainProduct  $product
     * @return
     */
    public function edit(MainProduct $product)
    {
        return view('/mod/products/edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainProduct  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, MainProduct $product)
    {
        $validationTemplate = [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['max:255'],
            'price' => ['required', 'numeric','gte:0'],
            'brand'=> ['max:50'],
            'category'=>['max:50'],
            'image' => ['image'],
        ];
        $data = $request->validate($validationTemplate);

        $imagePath = $request['image']==null? $product['image']:
            request('image')->store('images','public');
        $data['image'] = $imagePath;
        $data['point'] = $data['price']/10;
        $product->update($data);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function remove(MainProduct $product)
    {
        $this->middleware('auth:mod');
        $product->delete();
        return redirect('/mod/');
    }
}
