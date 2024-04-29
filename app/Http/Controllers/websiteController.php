<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class websiteController extends Controller
{
    //index
    public function index(){
        return view('website.home.index');
    }
}
