<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //index
    public function index(){
        return view('website.cart.index');
    }

//checkout
    public function checkout(){
        return view('website.cart.checkout');
    }
}
