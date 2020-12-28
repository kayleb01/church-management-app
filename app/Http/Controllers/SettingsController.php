<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class SettingsController extends Controller
{
   public function password(Request $request)
   {
      return view('dashboard.changepassword');
   }

   public function account()
   {    
       $user = User::where('ministry', auth()->user()->ministrys->id)->first();
       return view('dashboard.AccountSettings', compact('user'));
   }

   public function store(Request $request, User $id)
   {
       $this->validate($request, [
        'current' => 'required|min:8',
        'new'     => 'required|min:8|confirmed',
       ]);
        return $id->update([
            'password' => Hash::make(request['new'])
        ]);
   }

   public function update(Request $request, User $id)
   {
           //$this->authorize('update', $thread);
   $this->validate($request,[
       'ministry'      => 'required',
       'country'        => 'required',
       'firstname'      =>'required',
       'lastName'       => 'required',
       'mobile_number'  => 'required',
       'email'          => 'required',
       'gender'         => 'required',
   ]);
   
        $update = $id->update($request->all());
        if($update){
            return ['message' => 'User Account updated successfully'];
        }
   }
}
