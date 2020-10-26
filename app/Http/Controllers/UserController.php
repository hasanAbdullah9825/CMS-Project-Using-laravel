<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\user\UpdateProfileRequest;
use App\User;

class UserController extends Controller
{
    public function index(){

        return view('user.index')->with('users',User::all());
    }

    public function makeAdmin(User $user){
        
      $user->role='admin';
      $user->save();
      session()->flash('success','Admin made successfully');
      return redirect(route('users.index'));

    }

    public function edit(){

        return view('user.edit')->with('user',auth()->user());
    }

    public function updateProfile(UpdateProfileRequest $request){
        
        $user=auth()->user();
        $user->update([
            'name'=>$request->name,
            'about'=>$request->about
            
        ]);

        session()->flash('success','profile Updated Successfully');
        
        return redirect()->back();
       

    }
}
