<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class DetailController extends Controller
{
    //
    function detail($id) {
        $categories = Category::all();
        $selectedProduct = [];
        $product = Product::find($id);
        $selectedProduct = $product->getAttributes();

        $productCategoryNum = $product['category_id'];
        $similarProducts = [];

        $similarProducts = Product::all()->where('category_id', '=' , $productCategoryNum);
        $similarProducts = $similarProducts->toArray();
        return view('detail')->with([
            'selectedProduct'=> $selectedProduct,
            'categories' => $categories,
            'similarProducts' => $similarProducts,
        ]);
    }
}
