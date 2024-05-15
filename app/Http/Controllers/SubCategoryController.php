<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subCategory.index',[
            'subCategories' =>SubCategory::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.subCategory.create',[
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        SubCategory::saveSubCategory($request);
        return redirect()->route('subCategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        SubCategory::statusUpdate($id);
        return redirect()->route('subCategories.index');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.subCategory.edit',[
            'subCategory' =>SubCategory::find($id),
            'categories' =>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        SubCategory::updateSubCategory($request, $id);
        return redirect()->route('subCategories.index')->with('message','');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       SubCategory::deleteSubCategory($id);
       return redirect()->back()->with('message','Recorded Deleted');
    }
}
