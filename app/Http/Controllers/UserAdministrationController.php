<?php

namespace App\Http\Controllers;

use App\Models\Mod;
use Illuminate\Http\Request;

class UserAdministrationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:mod');
        $this->middleware('approval');
    }

    public function show(){
        $mods= Mod::all();
        return view('mod/administrate/users/show',compact('mods'));
    }

    public function makeAdmin(){

    }

    public function approve(Mod $mod){
        $mod['approval']->status = true;
        $mod['approval']->save();
        return redirect()->back();


    }

    public function delete(Mod $mod){
        try {
            $mod->delete();
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->back();


    }



}
