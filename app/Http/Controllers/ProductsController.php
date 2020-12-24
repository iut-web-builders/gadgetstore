<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view("products.create");
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

        auth()->user()->products()->create($data);
        return  redirect('/home');
    }

    /**
     * Display the specified resource.
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products/show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products/edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
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
    public function remove(Product $product)
    {
        $this->middleware('auth');
        $product->delete();
        return redirect('/settings/my-products');
    }
}
