<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;
class DetailController extends Controller
{
    //
    function detail($id) {
        $currentID = Session::get('currentID', '');
        $currentID = $id;
        Session::put('currentID', $currentID);
        $rating = Rating::all();
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
            'rating' => $rating,
        ]);
    }
    function rating(Request $request) {
        // // dd($request->post());
        $request->validate(Rating::$rules);
        $rating = new Rating;
        $rating->fill($request->post());

        $rating['reviewName'] = auth()->user()->name;
        $rating['reviewEmail'] = auth()->user()->email;
        $rating['user_id'] = auth()->user()->id;
        
        $currentID = Session::get('currentID', '');
        $rating['product_id'] = $currentID;
        // // dd($this->currentId);
        $rating->save();
        
        $product = Product::find($currentID);
        // $product->fill();
        $product['rating_count'] = $product['rating_count'] + 1;
        $product['rating'] = ($product['rating'] * $product['rating_count'] + $rating['rating']) / ($product['rating_count'] + 1);
        $product->save();
        // rating = (old_rating*rating_count + new_rating)/rating_count+1
        return redirect()->action([HomeController::class, 'index']);
    }
}
