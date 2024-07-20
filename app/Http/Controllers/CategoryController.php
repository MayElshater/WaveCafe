<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories=Category::get();
        $titlePage="Categories";
        return view('admin.categories', compact("categories","titlePage"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $titlePage="Add Category";
        return view('admin.addCategory',compact('titlePage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate($this->validationRules(), $this->errorMessages());
        Category::create($data);

        return redirect()->route('admin.categoriesList')->with('success', 'A New Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $category=Category::find($id);
        $titlePage="Edit Category";
        return view('admin.editCategory', compact('category','titlePage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        
        $data = $request->validate($this->validationRules($id));
        $category = Category::find($id);
        $category->update($data);

        return redirect()->route('admin.categoriesList')->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // Find the category by ID
            $category = Category::find($id);

            // If the category with the given ID is not found, handle the case
            if (!$category) {
                return redirect()->back()->with('error', 'Category not found.');
            }

            // Check if the category has any associated beverages
            if ($category->beverages()->count() > 0) {
                return redirect()->back()->with('error', 'You cannot delete this category because it contains beverages.');
            }

            // Delete the category
            $category->delete();

            // Redirect to categories index page with success message
            return redirect()->route("admin.categoriesList")->with('success', 'Category deleted successfully.');

    }
    private function validationRules()
{
    return [
        'name' => 'required|min:3|max:70',
        
    ];
}


private function errorMessages()
{
    return [
        'name.required' => 'The Category name is required.',
        'name.min' => 'The Category name must be at least 3 characters.',
        'name.max' => 'The Category name may not be greater than 70 characters.',
        
    ];
}

}
