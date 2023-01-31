@extends('layouts.admin')
@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="padding: 30px">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Rating</th>
                            <th scope="col">Rating Count</th>
                            <th scope="col">Image</th>
                            <th scope="col">Category</th>
                            <th scope="col">Size</th>
                            <th scope="col">Color</th>
                            <th scope="col">Price</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Recent</th>
                            <th scope="col">Featured</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($products as $index =>$product)
                            <tr>
                                <th scope="row">{{$index + 1}}</th>
                                <td>{{ $product['name'] }}</td>
                                <td>{{ $product['description'] }}</td>
                                <td>{{ $product['rating'] }}</td>
                                <td>{{ $product['rating_count'] }}</td>
                                <td><img src="{{asset('storage/'.$product->image)}}" style="width: 40px; height:40px" id="img-products" /></td>
                                <td>{{ $product['category']['name'] }}</td>
                                <td>{{ $product['size'] }}</td>
                                <td>{{ $product['color'] }}</td>
                                <td>{{ $product['price'] }}</td>
                                <td>{{ $product['discount'] }}</td>
                                @if($product["is_featured"] && $product["is_recent"]) {
                                    <td><button type="button" class="btn btn-success" disabled id="add-btn">Yes</button></td>
                                    <td><button type="button" class="btn btn-success" disabled id="add-btn">Yes</button></td> 
                                }
                                @elseif(!$product["is_featured"] && !$product["is_recent"]){
                                    <td><button type="button" class="btn btn-danger" disabled id="add-btn">No</button></td>
                                    <td><button type="button" class="btn btn-danger" disabled id="add-btn">No</button></td>
                                }
                                @elseif($product["is_recent"]){
                                    <td><button type="button" class="btn btn-danger" disabled id="add-btn">No</button></td>
                                    <td><button type="button" class="btn btn-success" disabled id="add-btn">Yes</button></td>
                                }
                                @elseif($product["is_featured"]){
                                    <td><button type="button" class="btn btn-success" disabled id="add-btn">Yes</button></td>
                                    <td><button type="button" class="btn btn-danger" disabled id="add-btn">No</button></td>
                                }
                                @endif
                                <td><a href="{{ url('admin/products/'.$product['id']. '/edit') }}"><button type="button" class="btn btn-warning"
                                    id="add-btn">Edit</button></a></td>
                                <td>
                                    <form action="{{ url('admin/products/'.$product['id']) }}" method="POST" id="del-form">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" id="add-btn" type="submit" form="del-form" value="Submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ url('admin/products/create') }}"><button type="button" class="btn btn-success"
                    id="add-btn">Create</button></a>
        </div>
@endsection