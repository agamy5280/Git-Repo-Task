@extends('layouts.admin')
@section('content')
    <div class="content-wrapper" style="padding: 30px; text-align: center;">
            <h1>Orders</h1>
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr style="text-align: center">
                        <th scope="col">#</th>
                        <th scope="col">ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Address 1</th>
                        <th scope="col">Address 2</th>
                        <th scope="col">Country</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Zip Code</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Shipping</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">User ID</th>
                    </tr>
                </thead>
                <tbody style="text-align: center">
                    @foreach($orders as $index => $order)
                        <tr>
                            <th scope="row">{{$index + 1}}</th>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['firstName'] }}</td>
                            <td>{{ $order['lastName'] }}</td>
                            <td>{{ $order['email'] }}</td>
                            <td>{{ $order['mobileNum'] }}</td>
                            <td>{{ $order['address1'] }}</td>
                            <td>{{ $order['address2'] }}</td>
                            <td>{{ $order['country'] }}</td>
                            <td>{{ $order['city'] }}</td>
                            <td>{{ $order['state'] }}</td>
                            <td>{{ $order['zipCode'] }}</td>
                            <td>{{ $order['total-price'] }}</td>
                            <td>{{ $order['shipping'] }}</td>
                            <td>{{ $order['sub_total'] }}</td>
                            <td>{{ $order['user_id'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="text-align: center; margin-top: 50px">
                <h1>Orders Details</h1>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Quantity</th>
                            <th scope="col">Order ID</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach($orderDetails as $index => $orderDetail)
                            <tr>
                                <th scope="row">{{$index + 1}}</th>
                                <td>{{ $orderDetail['id'] }}</td>
                                <td>{{ $orderDetail['productName'] }}</td>
                                <td>{{ $orderDetail['productQuantity'] }}</td>
                                <td>{{ $orderDetail['order_id'] }}</td>
                                <td>{{ $orderDetail['created_at'] }}</td>
                                <td>{{ $orderDetail['updated_at'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection