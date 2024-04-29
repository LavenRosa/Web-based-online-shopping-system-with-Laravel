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
        $validatedData = $request->validate([
            'categoryName' => 'required',
        ], [
            'categoryName.required' => 'Please Fill out this field.',
        ]);
        // $data = [
        //     'name'=>$request->categoryName,
        // ];
        Category::create($validatedData);
        return redirect()->route('CategoryList')->with(['success','Successfully Posted']);
    }

    //edit
    public function edit($id){
        $data = Category::where('id',$id)->first();
        return view('backend.category.edit', compact('data'));
    }
    //update
    public function update($id, Request $request){
        $Data = $request->validate([
            'categoryName' => 'required',
        ], [
            'categoryName.required' => 'Please Fill out this field.',
        ]);
        // $category = [
        //     'name'=>$request->categoryName,
        // ];
        Category::where('id',$id)->update($Data);
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

        // public function create(Request $request){
    //     $this->checkValidation($request, "create");
    //     $arr = [
    //         'title' => $request->title,
    //         'description' => $request->description,
    //         'price' => $request->price,
    //         'address' => $request->address,
    //     ];
    //     if($request->hasFile('image')){
    //         $filename = uniqid().'_'. $request->image->getClientOriginalName();
    //         $arr['image'] = $filename;
    //         $request->image->storeAs('public', $filename);
    //     }
    //     Customer::create($arr);
    //     return redirect()->route('customer.home')->with(["success" => "😎 Created Post - ".$request->title." successfully"]);
    // }

    // private function checkValidation($request, $mode){
    //     $rule = [
    //         'title' => 'required|min:5|unique:customers,title,'.$request->postId,
    //         'description' => 'required|min:5',
    //         'price' => 'required',
    //         'address' => 'required|min:5',
    //     ];
    //     $message = [
    //         'title.required' => 'title field is empty',
    //         'description.required' => 'description field is empty',
    //         'price.required' => 'price field is empty',
    //         'address.required' => 'address field is empty',
    //         'title.min' => 'title must be minimum 5 characters',
    //         'description.min' => 'description must be minimum 5 characters',
    //         'address.min' => 'address must be minimum 5 characters',
    //     ];
    //     if($mode == 'create'){
    //         $rule['image'] = 'required|file|mimes:png,jpg,jpeg';
    //     }
    //     Validator::make($request->all(), $rule, $message)->validate();
    // }
}
