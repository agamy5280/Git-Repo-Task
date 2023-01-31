@extends('layouts.admin')
@section('content')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <div class="container table-responsive py-5" id="table-con">
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr style="text-align: center">
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($categories as $index => $category)
                            <tr>
                                <th scope="row">{{$index + 1}}</th>
                                <td>{{ $category['name'] }}</td>
                                <td><img src="{{asset('storage/'.$category->image)}}" id="img-products" /></td>
                                <td><a href="{{ url('admin/categories/'.$category['id']. '/edit') }}"><button type="button" class="btn btn-warning"
                                    id="add-btn">Edit</button></a></td>
                                <td>
                                    <form action="{{ url('admin/categories/'.$category['id']) }}" method="POST" id="del-form">
                                        @method('DELETE')
                                        @csrf
                                        <button class="btn btn-danger" id="add-btn" type="submit" form="del-form" value="Submit">Delete</button>
                                    </form>
                                </td>    
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{ url('admin/categories/create') }}"><button type="button" class="btn btn-success"
                    id="add-btn">Add</button></a>
            </div>
        </div>
@endsection
