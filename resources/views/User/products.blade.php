@extends('layouts.layout')

@section('title', 'Products')

@section('heading', 'Products')

@section('name', session('name'))

@section('content')
<div class="container">
    <div class="row g-4">
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="card h-100" style="cursor: pointer;" onclick="window.location.href='{{ route('product.details', $product->id) }}'">
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top p-3" alt="{{ $product->name }}" style="height: 200px; object-fit: contain;">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold mb-1">{{ $product->name }}</h5>
                    <p class="text-muted small mb-2">
                        <span class="material-symbols-outlined align-middle me-1" style="font-size: 16px;">sell</span>
                        {{ $product->category }}
                    </p>
                    <p class="text-primary fw-bold mb-2">₹{{ $product->price }}</p>
                    <p class="card-text text-muted mb-3">{{ Str::limit($product->desc, 100) }}</p>
                    <div class="mt-auto">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small">
                                <span class="material-symbols-outlined align-middle me-1" style="font-size: 16px;">person</span>
                                {{ $product->user_name }}
                            </span>
                        </div>
                        @if($product->user_id !== session('user_id'))
                            @if(session('status') == true)
                                <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary w-100">
                                        <span class="material-symbols-outlined align-middle me-1">shopping_cart</span>
                                        Add to Wishlist
                                    </button>
                                </form>
                            @else
                                <div class="text-danger text-center">Account Blocked</div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
