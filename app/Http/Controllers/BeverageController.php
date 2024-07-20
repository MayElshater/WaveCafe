<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadFile;
use App\Models\Category;
use App\Models\Beverage;

class BeverageController extends Controller
{
    use UploadFile;
    /**
     * Display a listing of the resource.
     */

     private function validationRules()
    {
        return [
            'title' => 'required|min:3|max:100',
            'content' => 'required|max:500|min:11',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'category_id' => 'required'
        ];
    }
    private function updateValidationRules($id)
{
    return [
        'title' => 'required|min:3|max:100',
        'content' => 'required|max:500|min:11',
        'price' => 'required|numeric',
        'image' => 'nullable|image', // Corrected the validation rule for the image
        'category_id' => 'required'
    ];
}
    public function index()
    {
        //
        $beverages= Beverage::get();
        $titlePage="Beverages";
        return view('admin.beverages',compact('beverages','titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories=Category::get();
        $titlePage='Add Beverages';
        return view('admin.addBeverage', compact("categories",'titlePage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate($this->validationRules());

        $data['published'] = $request->has('published') ? 1 : 0;

        $data['special'] = $request->has('special') ? 1 : 0;

        $fileName = $this->upload($request->file('image'), 'assets/images');
        $data['image'] = $fileName;
        //$fileName = $this->upload($request->file('image'), 'assets/images');
        //$data['image'] = $fileName;
        

        Beverage::create($data);

        return redirect()->route('admin.beveragesList')->with('success', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $beverage = Beverage::find($id);
        $categories=Category::get();

    // Return the edit view with the client data
        return view('drink', compact('beverage', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $beverage = Beverage::find($id);
        $categories=Category::get();
        $titlePage="Edit Beverages";
        

    // Return the edit view with the client data
         return view('admin.editBeverage', compact('beverage', 'categories','titlePage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $data = $request->validate($this->updateValidationRules($id));

    $data['published'] = $request->has('published') ? 1 : 0;
    $data['special'] = $request->has('special') ? 1 : 0;

    $beverage = Beverage::find($id);

    if (!$beverage) {
        return redirect()->back()->with('error', 'Item not found.');
    }

    if ($request->hasFile('image')) {
        $fileName = $this->upload($request->file('image'), 'assets/images');
        $data['image'] = $fileName;
    } else {
        unset($data['image']);
    }

    $beverage->update($data);

    return redirect()->route('admin.beveragesList')->with('success', 'Item updated successfully.');

        
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
           $beverage = Beverage::find($id);

            // If the category with the given ID is not found, handle the case
            if (!$beverage) {
                return redirect()->back()->with('error', 'Beverage not found.');
            }

            

            // Delete the beverage
            $beverage->delete();

            // Redirect to beverages index page with success message
            return redirect()->route('admin.beveragesList')->with('success', 'Beverage deleted successfully.');
    }
  

/*
private function errorMessages()
{
    return [
        'title.required' => 'The title field is required.',
        'title.min' => 'The title must be at least 3 characters.',
        'title.max' => 'The title may not be greater than 100 characters.',
        'content.required' => 'The content field is required.',
        'content.max' => 'The content may not be greater than 500 characters.',
        'content.min' => 'The content must be at least 11 characters.',
        'price.required' => 'The price field is required.',
        //'price.numeric' => 'The price must be a number.',
        'image.required' => 'The image field is required.',
        'category_id.required' => 'The category field is required.',
        
      
        
    ];
}*/
}
