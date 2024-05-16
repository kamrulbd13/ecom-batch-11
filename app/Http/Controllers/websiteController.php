<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class websiteController extends Controller
{
    //index
    public function index(){
        return view('website.home.index',[
            'products'      =>Product::where('status', 1)->get(),
            'categories'    =>Category::where('status', 1)->get(),
        ]);
    }
}
