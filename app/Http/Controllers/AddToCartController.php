<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\AddToCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddToCartController extends Controller
{

    public function addItem(Request $request)
{
    $product_id = $request->input('product_id');
    $product_qty = $request->input('quantity');

    if (Auth::check()) {
        $prod_check = Item::where('id', $product_id)->first();

        if ($prod_check) {
            if (AddToCart::where('item_id', $product_id)->where('user_id', Auth::id())->exists()) {
                return response()->json(['status' => $prod_check->name . " is already added to cart"]);
            } else {
                $cartItem = new AddToCart();
                $cartItem->item_id = $product_id;
                $cartItem->user_id = Auth::id();
                $cartItem->quantity = $product_qty;
                $cartItem->save();
                return response()->json(['status' => $prod_check->name . " added to cart"]);
            }
        }
    } else {
        return response()->json(['error' => 'Unauthenticated'], 401);
    }
}

   public function viewcart(){
    $cartitems = AddToCart::where('user_id', Auth::id())->get();
    return view('frontend.cart', compact('cartitems'));
   }

   public function deleteitem(Request $request){
    if(Auth::check()){
        $item_id = $request->input('item_id');
        if(AddToCart::where('item_id', $item_id)->where('user_id', Auth::id())->exists()){
            $cartItem = AddToCart::where('item_id', $item_id)->where('user_id', Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status' =>  "Item Deleted Successfully"]);
        }
    }
    else{
        return redirect()->route('ShowUserLogin');
    }
   }

   public function updatecart(Request $request){
        $prod_id = $request->input('item_id');
        $prod_qty = $request->input('quantity');
        if(Auth::check()){
            if(AddToCart::where('item_id',  $prod_id)->where('user_id', Auth::id())->exists()){
                $cart = AddToCart::where('item_id',  $prod_id)->where('user_id', Auth::id())->first();
                $cart->quantity = $prod_qty;
                $cart->update();
                return response()->json(['status'=>'Quantity Updated']);
        }
   }
}


}
