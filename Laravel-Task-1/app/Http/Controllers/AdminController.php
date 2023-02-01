<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function admin()
    {
        return view('layouts.admin');
    }
    function admin_categories()
    {
        return view('layouts.categories.admin_categories')->with('categories',Category::all());
    }
    function admin_products()
    {
        return view('layouts.products.admin_products')->with('products',Product::all());
    }
    function admin_users()
    {
        return view('layouts.users.admin_users')->with('users', User::all());
    }
    function admin_orders()
    {
        $orders = Orders::all();
        $orderDetails = OrderDetails::all();
        return view('layouts.orders.admin_orders')->with([
            'orders' => $orders,
            'orderDetails' => $orderDetails,
        ]);
    }
}
