<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //register
    public function register(){
        return view('website.customer.register');
    }
    //register
    public function login(){
        return view('website.customer.login');
    }
}
