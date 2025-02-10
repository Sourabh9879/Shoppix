<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Edit Product</title>
    <style>
        .container {
            max-width: 600px;
            margin-top: 50px;
        }
        .img-thumbnail {
            width: 150px;
            height: 150px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group text-center">
                        <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.png,.jpeg">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" class="img-thumbnail mt-2">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="">Select Category</option>
                            <option value="Electronics" {{ $product->category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                            <option value="Furniture" {{ $product->category == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                            <option value="Vehicles" {{ $product->category == 'Vehicles' ? 'selected' : '' }}>Vehicles</option>
                            <option value="Real Estate" {{ $product->category == 'Real Estate' ? 'selected' : '' }}>Real Estate</option>
                            <option value="Books" {{ $product->category == 'Books' ? 'selected' : '' }}>Books</option>
                            <option value="Sports" {{ $product->category == 'Sports' ? 'selected' : '' }}>Sports</option>
                            <option value="Others" {{ $product->category == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="desc" name="desc" required>{{ $product->desc }}</textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('myproducts') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>