<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index',[
            'brands'=>Brand::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      Brand::saveBrand($request);
      return redirect()->route('brand.index')->with('message','Recorded Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Brand::statusUpdate($id);
        return redirect()->route('brand.index')->with('message','Recorded Update');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.brand.edit',[
            'brand' =>Brand::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

       Brand::brandUpdate($request, $id);
        return redirect()->route('brand.index')->with('message','Recorded Updated Successful.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::destroyBrand($id);
        return redirect()->back()->with('message','Recorded Deleted');
    }
}
