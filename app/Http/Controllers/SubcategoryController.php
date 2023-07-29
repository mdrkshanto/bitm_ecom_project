<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subcategory.index', ['subcategories' => Subcategory::orderBy('name', 'asc')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subcategory.create', ['categories' => Category::orderBy('name', 'asc')->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|unique:subcategories,name',
            'description' => 'nullable',
            'image' => 'nullable|image'
        ], [
            'category_id.exists' => 'The selected category is not exist.'
        ]);
        Subcategory::newSubcategory($request);
        return back()->with('message', 'Subcategory created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategory.edit', [
            'categories' => Category::orderBy('name', 'asc')->get(),
            'subcategory' => $subcategory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'name' => 'required|unique:subcategories,name,' . $id,
            'description' => 'nullable',
            'image' => 'nullable|image',
            'featured_status' => 'required|in:0,1',
            'status' => 'required|in:0,1',
        ], [
            'category_id.exists' => 'The selected category is not exist.',
            'status.in' => 'Status can only "Active" or "Inactive".',
            'featured_status.in' => 'Featured status can only "Active" or "Inactive".'
        ]);

        Subcategory::updateSubcategory($request, $id);
        return redirect()->route('subcategory.index')->with('message', 'Subcategory updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Subcategory::deleteSubcategory($id);
        return back()->with('message', 'Subcategory deleted successfully.');
    }
}
