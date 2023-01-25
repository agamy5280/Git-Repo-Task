<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    function create()
    {
        return view('layouts.categories.create_categories');
    }
    function store(Request $request)
    {
        //  dd($request->post());
        $request->validate(Category::$rules);
        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);
        $categories = new Category;
        // // Product::create($request->post());
        
        $categories->fill($request->post());
        $categories['image'] = $imageUrl;

        $categories->save();
        return redirect()->action([AdminController::class, 'admin_categories']);
    }
    function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('layouts.categories.edit_categories', compact('categories'));
    }
    function update($id, Request $request)
    {
        $categories = Category::findOrFail($id);

        $categories->fill($request->post());

        $imageUrl = $request->file('image')->store('products', ['disk' => 'public']);

        $categories['image'] = $imageUrl;

        $categories->save();
        return redirect()->action([AdminController::class, 'admin_categories']);
    }
    function destroy($id)
    {
        $categories = Category::findOrFail($id);
        Category::destroy($id);
        return redirect()->action([AdminController::class, 'admin_categories']);
    }
}
