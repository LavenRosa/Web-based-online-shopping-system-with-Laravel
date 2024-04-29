<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\AdminController;

class AdminController extends Controller
{
    //
    public function showadminregister(){
        return view('backend.Admin.adminregister');
    }
    public function adminregister(Request $request){
        $validate = Validator($request->all(), [
            'name'=>'required|string',
            'email'=>'required|email',
            'password'=>'required|min:8|confirmed'
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $register = Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request['password']),
        ]);
        if($register){
            return redirect()->route('ShowAdminLogin')->with('success','Successfully Registered');
        }else{
            return view('errors.500Page');
        }
    }

    public function showadminlogin(){
        return view('backend.Admin.adminlogin');
    }
    public function adminlogin(Request $request){
        $user = Admin::where('email', $request->email)->first();
        //dd($user);
        if(!empty($user)){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('Auther', $user);
                return redirect()->route('CustomerList');
            }else{
                return back()->withErrors('Password does not match');
            }
        }else{
            return back()->withErrors('User Not Found');
        }
    }
}
