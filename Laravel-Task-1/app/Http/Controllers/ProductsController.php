<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductsController extends Controller
{
    //
    function create()
    {
        return view('layouts.products.create_products')->with('categories',Category::all());
    }
    function store(Request $request)
    {
        //  dd($request->post());
        $request->validate(Product::$rules);
        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);
        $products = new Product;
        // // Product::create($request->post());
        
        $products->fill($request->post());
        $products['image'] = $imageUrl;
        $products['rating'] = 0;
        $products['rating_count'] = 0;
        $products['is_recent'] = $request['is_recent'] ? 1 : 0;
        $products['is_featured'] = $request['is_featured'] ? 1 : 0;
        $products->save();
        return redirect()->action([AdminController::class, 'admin_products']);
    }
    function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('layouts.products.edit_products', compact('products'))->with('categories', Category::all());
    }
    function update($id, Request $request)
    {
        $products = Product::findOrFail($id);

        $request->validate(Product::$rules);

        $products->fill($request->post());

        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);

        $products['image'] = $imageUrl;

        $products->save();
        return redirect()->action([AdminController::class, 'admin_products']);
    }
        // No need for fn show()
    function destroy($id)
    {
        $products = Product::findOrFail($id);
        Product::destroy($id);
        return redirect()->action([AdminController::class, 'admin_products']);
    }

}
