<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // This get all the records from the categories table
        // and every record is an object
        $allCategories = Category::all();
        return view('index', compact('allCategories'));
    }
}
