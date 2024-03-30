<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function list(){
        $items = Item::with('brand')->get();
        return view('backend.item.index', compact('items'));
    }
    public function createPage(){
        $categories = Category::get();
        $brands = Brand::get();
        return view('backend.item.create', compact('categories', 'brands'));
    }
    public function create(Request $request){
        $validate = validator($request->all(), [
            'name'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'price'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gid,svg,webp|max:1024',
            'detail'=>'required',
            'arrival_date' => 'nullable'
        ]);
        if(file_exists($request->itemimage)){
            $item_img = 'cover-img-'.uniqid().'.'.$request->itemimage->getClientOriginalExtension();
            $request->itemimage->move('assets/images/',$item_img); // upload image
            $item_path = 'assets/images/'.$item_img;

        }else{
            $item_img = 'assets/images/default-cover.jpg';
        }
        $item = [
            'name'=>$request->itemname,
            'category_id'=>$request->category,
            'brand_id'=>$request->brand,
            'price'=>$request->itemprice,
            'image'=>$item_path,
            'detail'=>$request->itemdetail,
            'arrival_date'=>$request->arrival_date,
        ];
        Item::create($item);
        //dd($item);
        return redirect()->route('ItemList');
    }
    //search
    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Item::search($search);

        return view('frontend.search', compact('results'));
    }
    public function detail($id){
        $item = Item::findOrFail($id);
        return view('frontend.itemdetail', compact('item'));
    }

}
