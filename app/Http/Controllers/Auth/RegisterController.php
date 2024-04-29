<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;


    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest');
    }



    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

    // protected function create(array $data)
    // {
    //    $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);
    //     if($user){
    //         return redirect()->route('ShowLogin');
    //     }
    // }

    public function register(){
        return view('auth.register');
    }

    public function customerregister(Request $request){
        // $validate = Validator($request->all(), [
        //     'name'=>'required|string',
        //     'email'=>'required|email',
        //     'password'=>'required|min:4|confirmed'
        // ]);
        $validate = Validator($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed' 
        ], [
            'name.required' => 'Please fill out this field.',
            'email.required' => 'Please fill out this field.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'Email is already taken.',
            'password.required' => 'Please fill out this field.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $register = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request['password']),
        ]);
        if($register){
            return redirect()->route('HomePage')->with('success','Successfully Registered');
        }else{
            return view('errors.500Page');
        }
    }
}
