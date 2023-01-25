@extends('layouts.admin')
@section('content')
<div class="content-wrapper" style="padding: 50px">
    <form method="POST" action="{{ url('admin/categories/'.$categories->id) }}" id="form-add" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h1>Add Category</h1>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Electronics" style="width: 400px;" value="{{ $categories->name }}">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Category Image</label>
            <input class="form-control" name="image" type="file" id="formFile" style="width: 250px;" value="{{ $categories->image }}">
        </div>
        <button class="btn btn-success" id="add-btn" type="submit" form="form-add" value="Submit">confirm</button>
    </form>
</div>
@endsection