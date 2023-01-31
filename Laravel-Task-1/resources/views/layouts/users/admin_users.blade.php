@extends('layouts.admin')
@section('content')
<div class="content-wrapper" style="padding: 30px">
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr style="text-align: center">
                <th scope="col">#</th>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created At</th>
                <th scope="col">Updated At</th>
                <th scope="col">Is Admin?</th>
            </tr>
        </thead>
        <tbody style="text-align: center">
            @foreach ($users as $index => $user)
                <tr>
                    <th scope="row">{{$index + 1}}</th>
                    <td>{{ $user['id'] }}</td>
                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['created_at'] }}</td>
                    <td>{{ $user['updated_at'] }}</td>
                    @if($user['is_admin'] == 1)
                    <td><button type="button" class="btn btn-success" disabled id="add-btn">Yes</button></td>
                    @else
                    <td><button type="button" class="btn btn-danger" disabled id="add-btn">No</button></td>
                    @endif
                </tr>

            @endforeach
        </tbody>
           
    </table>
</div>
@endsection