@extends('layouts.admlayout')

@section('title', 'Admin Dashboard')
@section('heading', 'Welcome to Admin Dashboard')
@section('name', session('name'))

@section('content')
<div class="container">
    <!-- Stats Row -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Users</h6>
                            <h3 class="mb-0">{{ $totalUsers ?? 0 }}</h3>
                        </div>
                        <span class="material-symbols-outlined text-primary fs-1">group</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Total Products</h6>
                            <h3 class="mb-0">{{ $totalProducts ?? 0 }}</h3>
                        </div>
                        <span class="material-symbols-outlined text-success fs-1">inventory_2</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Active Users</h6>
                            <h3 class="mb-0">{{ $activeUsers ?? 0 }}</h3>
                        </div>
                        <span class="material-symbols-outlined text-info fs-1">verified</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-2">Blocked Users</h6>
                            <h3 class="mb-0">{{ $blockedUsers ?? 0 }}</h3>
                        </div>
                        <span class="material-symbols-outlined text-danger fs-1">block</span>
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
                        <a href="{{ route('admuser') }}" class="btn btn-primary">
                            <span class="material-symbols-outlined align-middle me-1">manage_accounts</span>
                            Manage Users
                        </a>
                        <a href="{{ route('admproducts') }}" class="btn btn-success">
                            <span class="material-symbols-outlined align-middle me-1">inventory_2</span>
                            Manage Products
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
                        <a href="{{ route('admproducts') }}" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th>Seller</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products ?? [] as $product)
                                <tr>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category }}</td>
                                    <td>₹{{ $product->price }}</td>
                                    <td>{{ $product->user_name }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('DeleteProduct', $product->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <span class="material-symbols-outlined">delete</span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        margin-bottom: 1rem;
    }
    .table img {
        border: 1px solid #eee;
    }
    .btn .material-symbols-outlined {
        font-size: 1.2rem;
    }
</style>
@endsection
