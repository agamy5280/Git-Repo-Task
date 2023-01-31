<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    function cart(Request $request){
        $categories = Category::all();
        $request->session()->forget('products');
        $ids = Session::get('ids', []);
        $productSession = Session::get('products', []);
        $shippingSession = Session::get('shipping', 0);
        $subTotalSession = Session::get('subTotal', 0);
        $totalSession = Session::get('total', 0);
        $products = [];
        $quantity = [];
        $subTotal = 0;
        $shipping = 0;
        $total = 0;
        for($i=0; $i < count($ids); $i++){
            if(Product::find($ids[$i]['id'])){
                $product = Product::find($ids[$i]['id']);
                $products[$i] = $product->getAttributes();
                array_push($quantity, $ids[$i]['quantity']);
            }
            array_push($productSession, $products[$i]);
            $shipping += 10;
            $shippingSession = $shipping;

            $subTotal += $quantity[$i] * ($products[$i]['price'] - ($products[$i]['price'] * $products[$i]['discount']));
            $subTotalSession = $subTotal;

            $total = $shipping + $subTotal;
            $totalSession = $total;
        }
        Session::put('products', $productSession);
        Session::put('shipping', $shippingSession);
        Session::put('subTotal', $subTotalSession);
        Session::put('total', $totalSession);
        return view('cart')->with([
            'products' => $products,
            'subTotal' => $subTotal,
            'total' => $total,
            'shipping' => $shipping,
            'quantity' => $quantity,
            'categories' => $categories
        ]);
    }
    function addproductID(Request $request)
    {
        $ids = Session::get('ids', []);
        $targetID = $request->get('id');
        $flag = 0;
        if ($request->has('id')){
            for ($i = 0; $i < count($ids); $i++){
                if($targetID == $ids[$i]['id']){
                    $ids[$i]['quantity'] += 1;
                    $flag = 1;
                }else {
                    $ids[$i]['quantity'] = 1;
                    $flag = 0;
                }
            }
            if($flag == 0){
                array_push($ids, ['id' => $targetID, 'quantity' => 1]);
                Session::put('ids', $ids);
                return response()->json('Data Added');
            }else{
                Session::put('ids', $ids);
                return response()->json('Product duplicated!');
            }
        } 
        else {
            return abort(404);
        }
    }
    function addproductIDToWishList(Request $request)
    {
        $ids = Session::get('wishListIds', []);
        $targetID = $request->get('id');
        $flag = 0;
        if ($request->has('id')){
            for ($i = 0; $i < count($ids); $i++){
                if($targetID == $ids[$i]['id']){
                    $ids[$i]['quantity'] += 1;
                    $flag = 1;
                }else {
                    $ids[$i]['quantity'] = 1;
                    $flag = 0;
                }
            }
            if($flag == 0){
                array_push($ids, ['id' => $targetID, 'quantity' => 1]);
                Session::put('wishListIds', $ids);
                return response()->json('Data Added');
            }else{
                Session::put('wishListIds', $ids);
                return response()->json('Product duplicated!');
            }
        } 
        else {
            return abort(404);
        }
    }
    function increaseProductQuantity (Request $request) {
        $ids = Session::get('ids', []);
        $targetID = $request->get('id');
        if ($request->has('id')){
            for ($i = 0; $i < count($ids); $i++){
                if($targetID == $ids[$i]['id']){
                    $ids[$i]['quantity'] += 1;
                }
            }
            Session::put('ids', $ids);
        }else {
            return abort(404);
        }
    }
    function decreaseProductQuantity (Request $request) {
        $ids = Session::get('ids', []);
        $targetID = $request->get('id');
        if ($request->has('id')){
            for ($i = 0; $i < count($ids); $i++){
                if($targetID == $ids[$i]['id']){
                    if($ids[$i]['quantity'] > 1){
                        $ids[$i]['quantity'] -= 1;
                    }
                }
            }
            Session::put('ids', $ids);
        }else {
            return abort(404);
        }
    }
    function removeProduct(Request $request)
    {
        $targetID = $request->get('id');
        $ids = Session::get('ids', []);
        if($request->has('id')){
            for ($i = 0; $i < count($ids); $i++){
                if($targetID == $ids[$i]['id']){
                    array_splice($ids, $i, 1);
                }
            }
            Session::put('ids', $ids);
        }
        else {
            return abort(404);
        }
    }
        
}
