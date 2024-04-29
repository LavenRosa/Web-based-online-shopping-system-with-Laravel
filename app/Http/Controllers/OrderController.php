<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function list(){
        $orders = Order::OrderBy('created_at', 'desc')->get();
        return view('backend.customer.orderlist', compact('orders'));
    }
    public function delete($id){
        Order::where('id', $id )->delete();
        return redirect()->route('OrderList')->with('success', 'Successfully Deleted!');
    }

}
