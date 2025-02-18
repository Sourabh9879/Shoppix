@extends('layouts.layout')

@section('title', 'User Dashboard')

@section('heading', 'Welcome to your Dashboard')

@section('name', session('name'))

@section('content')
<div class="container">
    <!-- Stats Row -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">My Products</h6>
                            <h3 class="mb-0">{{ $myProducts ?? 0 }}</h3>
                        </div>
                        <span class="material-symbols-outlined text-primary fs-1">inventory_2</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Cart Items</h6>
                            <h3 class="mb-0">{{ $cartItems ?? 0 }}</h3>
                        </div>
                        <span class="material-symbols-outlined text-success fs-1">shopping_cart</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Products</h6>
                            <h3 class="mb-0">{{ $totalProducts ?? 0 }}</h3>
                        </div>
                        <span class="material-symbols-outlined text-info fs-1">category</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Status</h6>
                            <h3 class="mb-0">{{ session('status') ? 'Active' : 'Blocked' }}</h3>
                        </div>
                        <span class="material-symbols-outlined {{ session('status') ? 'text-success' : 'text-danger' }} fs-1">
                            {{ session('status') ? 'verified' : 'gpp_bad' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Quick Actions</h5>
                    <div class="d-flex gap-2">
                        @if(session('status') === 1)
                        <a href="{{ route('addProduct') }}" class="btn btn-primary">
                            <span class="material-symbols-outlined align-middle me-1">add_circle</span>
                            Add Product
                        </a>
                        @endif
                        <a href="{{ route('cart') }}" class="btn btn-success">
                            <span class="material-symbols-outlined align-middle me-1">shopping_cart</span>
                            View Wishlist
                        </a>
                        <a href="{{ route('userproducts') }}" class="btn btn-info text-white">
                            <span class="material-symbols-outlined align-middle me-1">store</span>
                            Browse Products
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Products -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="card-title mb-0">Recent Products</h5>
                        <a href="{{ route('userproducts') }}" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    @if(isset($recentProducts) && count($recentProducts) > 0)
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Seller</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentProducts as $product)
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ asset('storage/' . $product->image) }}" 
                                                 alt="{{ $product->name }}" 
                                                 class="rounded me-2"
                                                 style="width: 80px; height: 80px; object-fit: cover;">
                                            <span>{{ $product->name }}</span>
                                        </div>
                                    </td>
                                    <td class="align-middle">{{ $product->category }}</td>
                                    <td class="align-middle">₹{{ $product->price }}</td>
                                    <td class="align-middle">{{ $product->user_name }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <p class="text-muted text-center my-4">No products available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .stat-card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        margin-bottom: 1rem;
    }
    
    .table img {
        border: 1px solid #eee;
    }
    
    .btn .material-symbols-outlined {
        font-size: 1.2rem;
    }
    
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
</style>
@endsection