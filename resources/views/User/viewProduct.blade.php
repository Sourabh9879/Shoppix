<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <title>Product Details</title>
    <style>
        .container {
            margin-top: 50px;
        }
        .product-image {
            max-width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product-details {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .product-details h2 {
            margin-bottom: 20px;
        }
        .product-details p {
            font-size: 1.1em;
            margin-bottom: 20px;
        }
        .product-details h4 {
            margin-bottom: 20px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .price {
            color: #B12704;
            font-size: 1.5em;
            font-weight: bold;
        }
        .add-to-cart {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid product-image" alt="{{ $product->name }}">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto product-details">
                <h2>{{ $product->name }}</h2>
                <p>{{ $product->desc }}</p>
                <h4 class="price">₹{{ $product->price }}</h4>
                <form action="{{ route('addToCart', $product->id) }}" method="POST" class="add-to-cart">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-lg ">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>