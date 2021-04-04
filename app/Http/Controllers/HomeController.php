<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // This will get all the records from the categories table
        // and every record is an object and passed into the view
        $allCategories = Category::all();

        // This will get all the records from the products table
        // and every record is an object and passed into the view
        // $allProducts = Product::all();
       // We will increase performance instead of Product::all();
       // we will use the Product->with('category') It means load all relationship
        // in the Controller and at final we will use get() instead of all()


        // Basically with() is condition and all() is without any condition
        $allProducts = Product::with('category')->get();
        return view('index', compact('allCategories','allProducts'));
    }
}
