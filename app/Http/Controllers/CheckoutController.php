<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Checkout;
use App\Models\AddToCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CheckoutController;

class CheckoutController extends Controller
{
    //
    public function index(){
        $cartitems = AddToCart::where('user_id', Auth::id())->get();
        return view('frontend.checkout', compact('cartitems'));
    }
    public function placeorder(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'township' => 'required',
            'payment' => 'required',
        ], [
            'name.required' => 'Please fill out the name field.',
            'phone.required' => 'Please fill out the phone field.',
            'address.required' => 'Please fill out the address field.',
            'state.required' => 'Please fill out the state field.',
            'township.required' => 'Please fill out the township field.',
            'payment.required' => 'Please fill out the payment field.',
        ]);
        // if($validate->fails()){
        //     return redirect()->back()->withErrors($validate)->withInput();
        // }
        $order = new Checkout();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->state = $request->input('state');
        $order->township = $request->input('township');
        $order->ordernotes = $request->input('ordernotes');
        $order->payment = $request->input('payment');
        //$order->payment = 'Kpay';
        $order->tracking_no = 'hlaing'.rand(1111,9999);
        $order->save();

        $order->id;

        $cartitems = AddToCart::where('user_id', Auth::id())->get();
        foreach($cartitems as $item){
            Order::create([
                'checkout_id'=>$order->id,
                'item_id'=>$item->item_id,
                'quantity' => $item->quantity,
                'price' => $item->item->price,
            ]);
        }

        $cartitems = AddToCart::where('user_id', Auth::id())->get();
        AddToCart::destroy($cartitems);
        return redirect('/')->with('status', "Order Placed Successfully");

    }
}
