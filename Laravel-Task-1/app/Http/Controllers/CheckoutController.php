<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    //
    function checkout() {
        $categories = Category::all();
        $productSession = Session::get('products', []);
        $shippingSession = Session::get('shipping', 0);
        $subTotalSession = Session::get('subTotal', 0);
        $totalSession = Session::get('total', 0);
        return view('checkout')->with([
            'products' => $productSession,
            'subTotal' => $subTotalSession,
            'total' => $totalSession,
            'shipping' => $shippingSession,
            'categories' => $categories,
        ]);
    }
}
