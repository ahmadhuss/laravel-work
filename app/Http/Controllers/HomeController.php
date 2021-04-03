<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $allCategories = ['Category 1', 'Category 2'];
        return view('index', compact('allCategories'));
    }
}
