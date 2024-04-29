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
        ],[
            'name.required' => 'Please fill out name field.',
            'category_id.required' => 'Please choose the category.',
            'brand_id.required' => 'Please choose the brand.',
            'price.required' => 'Please fill out price field.',
            'image.required' => 'Please Fill the image.',
            'image.image' => 'Only image is allowed.',
            'image.mimes' => 'Allow jpeg, png, jpg, gid, svg, webp',
            'image.max' => 'Must not 1024 size',
            'detial.required' => 'Please fill out detail field.',
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
        return redirect()->route('ItemList')->with('success','Successfully Created!');
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

    public function edit($id){
        $item = Item::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();
        return view('backend.item.edit', compact('item', 'categories', 'brands'));
    }
    public function update(Request $request, $id){
        $item = Item::findOrFail($id);

        $validate = validator($request->all(), [
            'name'=>'required',
            'category_id'=>'required',
            'brand_id'=>'required',
            'price'=>'required',
            'image'=>'image|mimes:jpeg,png,jpg,gid,svg,webp|max:1024',
            'detail'=>'required',
            'arrival_date' => 'nullable'
        ]);

        if ($request->hasFile('image')) {
            $item_img = 'cover-img-'.uniqid().'.'.$request->itemimage->getClientOriginalExtension();
            $request->itemimage->move('assets/images/', $item_img); // upload image
            $item_path = 'assets/images/'.$item_img;
            $item->image = $item_path;
        }

        $item->name = $request->itemname;
        $item->category_id = $request->category;
        $item->brand_id = $request->brand;
        $item->price = $request->itemprice;
        $item->detail = $request->itemdetail;
        $item->arrival_date = $request->arrival_date;

        $item->save();

        return redirect()->route('ItemList')->with('success', 'Successfully Updated!');
    }
    public function delete($id){
        $item = Item::findOrFail($id);
        if (file_exists($item->image)) {
            unlink($item->image); // Delete image file
        }
        $item->delete();

        return redirect()->route('ItemList')->with('success', 'Successfully Deleted!');
    }




}
