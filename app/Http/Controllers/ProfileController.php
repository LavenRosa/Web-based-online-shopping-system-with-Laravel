<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function store($itemId)
    {
        // Check if the item already exists in the favorites
        $existingFavorite = Profile::where('user_id', Auth::id())
                                    ->where('item_id', $itemId)
                                    ->first();

        if ($existingFavorite) {
            return redirect()->back()->with('error', 'Item already in favorites');
        }

        $favorite = new Profile();
        $favorite->user_id = Auth::id();
        $favorite->item_id = $itemId;
        $favorite->save();

        return redirect()->back()->with('success', 'Added to favorites');
    }


    public function show(){
        $users = Auth::user();
        $favorites = Profile::where('user_id', Auth::id())->get();

        return view('frontend.profile', compact('users','favorites'));
    }
   public function delete($itemId){
    $favorite = Profile::where('user_id', Auth::id())
                        ->where('item_id', $itemId)
                        ->first();

    if (!$favorite) {
        return redirect()->back()->with('error', 'Favorite not found');
    }

    $favorite->delete();

    return redirect()->back()->with('success', 'Removed from favorites');
}
    

}
