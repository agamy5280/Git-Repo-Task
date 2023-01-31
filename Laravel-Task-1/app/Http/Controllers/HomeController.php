<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('index')->with([
            'categories' => $categories,
            'products' => $products
        ]);
    }

    function shop(Request $request){
        $query = Product::query();
        $inputs = $request->all();
        $products = Product::all();
        $categories = Category::all();
        if (isset($inputs['keywords'])) {
            $query = $query->where('name', 'like',  $inputs['keywords'] );
            $query = $query->orderByDesc('created_at');
            $productName = $query->getBindings();
            $searchedProduct = Product::all()->where('name', '=', $productName[0]);
            $searchedProduct = $searchedProduct->toArray();
            $products = $searchedProduct;
        }
        return view('shop')->with(['products' => $products, 'categories' => $categories]);
    }
    
}