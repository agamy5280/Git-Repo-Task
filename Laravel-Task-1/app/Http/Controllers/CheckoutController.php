<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Support\Facades\Schema;
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
    function addOrder(Request $request) {
        // dd($request->post());
        $request->validate(Orders::$rules);
        $order = new Orders;
        $order->fill($request->post());

        $shippingSession = Session::get('shipping', 0);
        $subTotalSession = Session::get('subTotal', 0);
        $totalSession = Session::get('total', 0);

        $order['shipping'] = $shippingSession;
        $order['sub_total'] = $subTotalSession;
        $order['total-price'] = $totalSession;
        $order['user_id'] = auth()->user()->id;
        
        $order->save();
        
        $ids = Session::get('ids', []);

        for($i = 0; $i < count($ids); $i++){
            $orderDetail = new OrderDetails;  
            $productQuantity = $ids[$i]['quantity'];
            $product = Product::find($ids[$i]['id']);
            $products[$i] = $product->getAttributes();
            $productName =  $products[$i]['name'];
            $orderDetail['productName'] = $productName;
            $orderDetail['productQuantity'] = $productQuantity;
            $orderDetail['order_id'] = $order->id;
            $orderDetail->save();
        }
        return redirect()->action([HomeController::class, 'index']);
        
    }
}
