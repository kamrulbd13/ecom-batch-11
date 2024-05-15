<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index',[
            'products' => Product::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create',[
            'categories' =>Category::where('status',1)->get(),
            'subCategories' =>SubCategory::where('status',1)->get(),
            'brands' =>Brand::where('status',1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::saveProduct($request);
        return redirect()->back()->with('message','Product has been added');
    }

    /**
     * Display the specified resource.
     */
    public function details(string $id)
    {
        return view('website.product.details',[
            'product' =>Product::where('status', 1)->first(),
        ]);
    }

    public function status(string $id){

          Product::statusUpdate($id);
        return redirect()->route('product.index')->with('message','Status has been Updated');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.product.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
