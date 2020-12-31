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
        //
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
