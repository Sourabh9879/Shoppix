@extends('layouts.layout')

@section('title', 'Add Product')

@section('heading', 'Add Product')

@section('name', session('name'))

@section('content')
    <div class="card mx-auto" style="max-width: 600px;">
        <div class="card-body">
            <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group text-center">
                    <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.png,.jpeg" required>
                </div>
                <div class="form-group">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Electronics">Electronics</option>
                        <option value="Furniture">Furniture</option>
                        <option value="Vehicles">Vehicles</option>
                        <option value="Real Estate">Real Estate</option>
                        <option value="Books">Books</option>
                        <option value="Sports">Sports</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="desc" name="desc" required></textarea>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
            </form>
        </div>
    </div>
@endsection