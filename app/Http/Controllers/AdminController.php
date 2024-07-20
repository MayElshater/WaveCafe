<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beverage;
use App\Models\Category;


class AdminController extends Controller
{
    //
    /*
    public function users()
    {   
        
        return view('admin.users');
    }
    public function adduser()
    {   
        
        return view('admin.addUser');
    }*/
    /*
    public function login()
    {
        return view('admin.login');
    }


    public function register()
    {
        return view('admin.login');
    }*/

    public function index(){
       
        return view('index');
    }
    public function contact(){
       
        return view('contact');
    }
    public function aboutus(){
       
        return view('aboutus');
    }
    public function special(){
        $specialBeverages = Beverage::where('special', 1)->get();
       
        return view('special',compact('specialBeverages'));
    }
    public function drink(){

        
       // Fetch all published beverages with their associated category
    $beverages = Beverage::with('category')->where('published', 1)->get();

    // Group beverages by category name
    $groupedBeverages = $beverages->groupBy(function($item) {
        return $item->category->name; // Assuming `name` is the category name field
    });
    

    return view('drink', compact('groupedBeverages'));
        
    }

}
