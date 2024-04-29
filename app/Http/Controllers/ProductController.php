<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //index
    public function index(){
        return view('website.product.index');
    }
    //productDetails
    public function productDetails(){
        return view('website.product.details');
    }
}
