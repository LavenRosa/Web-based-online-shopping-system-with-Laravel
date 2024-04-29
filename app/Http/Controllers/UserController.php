<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function showchangepassword(){
        return view('frontend.changepassword');
    }
    public function changepassword(Request $request){
        $validate = validator($request->all(), [
            'name'=>'required',
            'email'=>'required',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate);
        }
        if($request->newpassword){
            if(Hash::check($request->password, Auth::user()->password)){ //$request->currentpassword and old password -->check
                if($request->newpassword == $request->cnewpassword){ //validate new password and confirm new password
                    $new_password = Hash::make($request->newpassword);
                }else{
                    return back()->withErrors('Password does not match');
                }
            }else{
                return back()->withErrors("Current Password doesn't Correct!");
            }
        }
        $admin = User::find(Auth::user()->id);
        if($admin){
            $admin->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>$new_password,
            ]);
            return redirect()->route('ShowProfile')->with('success','Successfully!');
        }else{
            return view('errors.404Page');
        }
    }
    public function list(){
        $customers = User::OrderBy('created_at', 'desc')->get();
        return view('backend.customer.customerlist', compact('customers'));
    }
}
