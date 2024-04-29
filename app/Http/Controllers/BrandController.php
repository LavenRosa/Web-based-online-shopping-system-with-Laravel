<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function createPage(){
        return view('backend.brand.create');
    }
    public function create(Request $request){
        $data = [
            'name'=>$request->brandname,
        ];
        Brand::create($data);
        return redirect()->route('BrandList')->with('success', 'Successfully Created!');
    }
    public function edit($id){
        $data = Brand::where('id',$id)->first();
        return view('backend.brand.edit', compact('data'));
    }
    //update
    public function update($id, Request $request){
        $brand = [
            'name'=>$request->brandname,
        ];
        Brand::where('id',$id)->update($brand);
        return redirect()->route('BrandList')->with('success','Successfully Updated');
    }
    //delete
    public function delete($id){
       Brand::where('id',$id)->delete();
        return redirect()->route('BrandList')->with('success','Successfully Deleted');
    }
    public function list(){
        $brands = Brand::get();
        return view('backend.brand.list', compact('brands'));
    }
    public function show($brand){
        $brand = Brand::where('id',$brand)->firstOrFail();
        $items = Item::where('brand_id', $brand->id)->get();
        return view('frontend.brand', compact('brand','items'));
    }
    public function frontend()
    {
        $cats = Category::Orderby('created_at', 'desc')->get();
        $bds = Brand::all();
        return view('layout.frontend', compact('cats', 'bds'));
    }
}
