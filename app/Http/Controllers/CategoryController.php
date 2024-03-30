<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    //category list
    public function list(){
        $category = Category::get();
        return view('backend.category.index', compact('category'));
    }
    //creat page
    public function createPage(){
        return view('backend.category.create');
    }
    //create post
    public function create(Request $request){
        $data = [
            'name'=>$request->categoryName,
        ];
        Category::create($data);
        return redirect()->route('CategoryList')->with(['success','Successfully Posted']);
    }
    //edit
    public function edit($id){
        $data = Category::where('id',$id)->first();
        return view('backend.category.edit', compact('data'));
    }
    //update
    public function update($id, Request $request){
        $category = [
            'name'=>$request->categoryName,
        ];
        Category::where('id',$id)->update($category);
        return redirect()->route('CategoryList')->with(['success','Successfully Updated']);
    }
    //delete
    public function delete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('CategoryList')->with(['success','Successfully Deleted']);
    }
    public function show($category){
        $category = Category::where('id',$category)->firstOrFail();
        $items = Item::where('category_id', $category->id)->get();
        return view('frontend.category', compact('category','items'));
    }
}
