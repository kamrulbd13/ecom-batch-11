<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return view('admin.category.index',[
            'categories'=>Category::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Category::saveCategory($request);
        return redirect()->back()->with('message','Category Info Create Successfully. ');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Category::statusUpdate($id);
        return redirect()->back()->with('message','Status Change Successfully. ');

    }
    public function status($id){
            return view('');
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.category.edit', [
            'category' =>Category::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {

        Category::updateCategory($request, $id);
        return redirect()->route('categories.index')->with('message', 'Update Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Category::deleteCategory($id);
        return redirect()->back()->with('message','Delete Successfully.');
    }
}
