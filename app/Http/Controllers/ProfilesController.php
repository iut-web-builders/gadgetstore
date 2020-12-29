<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Profile;
use App\Models\GeneralUser;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
      //  $follows = (auth()->user())? auth()->user()->following->contains($user->id):false;
        $products = auth()->user()->products();
        return view('profiles.index',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = auth()->user()->profile;
        return view('/profiles/edit',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {

        $data = $request->validate([
            "address" => ['max:512'],
            "contact_number" => ['digits_between:4,15'],
            "image" =>['image'],
        ]);
        $imagePath = $request['image']==null? $profile['image']:
        request('image')->store('images','public');
        $data['image'] = $imagePath;

        $profile['image'] = $data['image'];
        $profile['contact_number'] = $data['contact_number'];
        $profile['address'] = $data['address'];
        $profile->save();
       // dd($profile->id);
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
