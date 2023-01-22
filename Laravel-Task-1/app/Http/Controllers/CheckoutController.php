<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    //
    function checkout() {
        $productSession = Session::get('products', []);
        $shippingSession = Session::get('shipping', 0);
        $subTotalSession = Session::get('subTotal', 0);
        $totalSession = Session::get('total', 0);
        return view('checkout')->with([
            'products' => $productSession,
            'subTotal' => $subTotalSession,
            'total' => $totalSession,
            'shipping' => $shippingSession,
        ]);
    }
}
