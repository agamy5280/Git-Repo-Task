<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
class ProductsController extends Controller
{

    // Database has been modified to enable default values for is_recent, is_featured, rating and rating_count (User does not need to input those values).
    function create()
    {
        return view('layouts.products.create_products')->with('categories',Category::all());
    }
    function store(Request $request)
    {
         // dd($request->post());
        $request->validate(Product::$rules);
        Product::create($request->post());

        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);
        $products = new Product;

        $products->fill($request->post());
        $products['image'] = $imageUrl;
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
