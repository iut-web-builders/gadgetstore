<?php

namespace App\Http\Controllers;

use App\Models\ModProfile;
use Illuminate\Http\Request;

class ModProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mod');
        $this->middleware('approval');
    }

    public function home(){
        $user = auth('mod')->user();
       // dd($user);
        if ($user->profile->image==null)
            $user->profile->image = "/images/svg/noimage.svg";
        return view('mod/home',compact('user'));
    }

    protected function index()
    {
        return $this->home();
    }

    public function edit()
    {
        $profile = auth('mod')->user()->profile;
        return view('/mod/profile/edit',compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = auth('mod')->user()->profile;

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
}
