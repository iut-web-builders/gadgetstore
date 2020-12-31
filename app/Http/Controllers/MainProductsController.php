<?php

namespace App\Http\Controllers;

use App\Models\MainProduct;
use Illuminate\Http\Request;

class MainProductsController extends Controller
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
    public function show(MainProduct $mainProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainProduct  $mainProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(MainProduct $mainProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainProduct  $mainProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MainProduct $mainProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainProduct  $mainProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(MainProduct $mainProduct)
    {
        //
    }
}
