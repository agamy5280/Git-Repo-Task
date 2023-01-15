@extends('layouts.admin')
@section('content')
<div class="content-wrapper" style="padding: 50px">
    <form method="POST" action="{{ url('admin/products/') }}" id="form-add" enctype="multipart/form-data">
        @csrf
        <h1>Add Products</h1>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Camera" style="width: 400px;">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Product Image</label>
            <input class="form-control" name="image" type="file" id="formFile" style="width: 250px;">
        </div>
        <div class="mb-3">
             <label for="exampleFormControlTextarea1" class="form-label">Product Description</label>
             <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" style="width: 700px;"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Product Category:</label>
            <select class="form-select" aria-label="Default select example" style="width: 250px;">
                <option selected>Select Product Category</option>
                @foreach($categories as $index =>$category )
                <option>{{ $category['name'] }}</option>
                @endforeach
             </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Price:</label>
            <input type="number" name="price" class="form-control" id="exampleFormControlInput1" placeholder="$50" style="width: 250px;">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Discount Percentage:</label>
            <input type="number" name="discount" class="form-control" id="exampleFormControlInput1" placeholder="0.25" style="width: 250px;">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Size:</label>
            <input type="text" class="form-control" name="size" id="exampleFormControlInput1" placeholder="XL" style="width: 250px;">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Color:</label>
            <input type="text" class="form-control" name="color" id="exampleFormControlInput1" placeholder="Black" style="width: 250px;">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_featured" id="exampleRadios1" value=1
                >
            <label class="form-check-label" for="exampleRadios1">
                Featured Product
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_recent" id="exampleRadios2" value=1>
            <label class="form-check-label" for="exampleRadios2">
                 Recent Product
            </label>
        </div>
        <button class="btn btn-success" id="add-btn" type="submit" form="form-add" value="Submit">confirm</button>
    </form>
    </div>
</div>
@endsection