<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function admin()
    {
        return view('layouts.admin');
    }
    function admin_categories()
    {
        return view('layouts.admin_categories')->with('categories',Category::all());
    }
}
