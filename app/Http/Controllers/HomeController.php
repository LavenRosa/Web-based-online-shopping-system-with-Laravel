<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('frontend.index', compact('categories', 'brands'));
    }
}
