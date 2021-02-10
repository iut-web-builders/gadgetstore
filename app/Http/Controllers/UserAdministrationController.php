<?php

namespace App\Http\Controllers;

use App\Models\Mod;
use App\Models\User;
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
        $users=User::all();
        return view('mod/administrate/users/show',compact('mods','users'));
    }

    public function makeAdmin(Mod $mod){
        if(!auth('mod')->user()['is_admin']==true){
            return redirect()->back();
        }
        $mod['is_admin']=true;
        $mod->save();
        return redirect()->back();
    }

    public function approve(Mod $mod){
        if(!auth('mod')->user()['is_admin']==true){
            return redirect()->back();
        }
        $mod['approval']->status = true;
        $mod['approval']->save();
        return redirect()->back();


    }

    public function deleteMod(Mod $mod){
        try {
            $mod->delete();
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->back();

    }

    public function deleteUser(User $user){
        try {
            $user->delete();
        } catch (\Exception $e) {
            dd($e);
        }
        return redirect()->back();

    }





}
