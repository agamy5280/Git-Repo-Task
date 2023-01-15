<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function admin()
    {
        return view('layouts.admin');
    }
    function admin_categories()
    {
        return view('layouts.categories.admin_categories')->with('categories',Category::all());
    }
    function admin_products()
    {
        return view('layouts.products.admin_products')->with('products',Product::all());
    }
}
