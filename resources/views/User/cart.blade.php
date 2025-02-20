@extends('layouts.layout')

@section('title', 'Wishlist')

@section('heading', 'Wishlist')

@section('name', session('name'))

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success" id="alertMessage">{{ session('success') }}</div>
    @endif

    @if($cartItems->isEmpty())
    <div class="text-center py-5">
        <span class="material-symbols-outlined" style="font-size: 4rem; color: #9ca3af;">shopping_cart</span>
        <h3 class="mt-3">Your Wishlist is empty</h3>
        <p class="text-muted">Browse products and add items to your Wishlist</p>
        <a href="{{ route('userproducts') }}" class="btn btn-primary mt-3">Browse Products</a>
    </div>
    @else
    <div class="row g-4">
        @foreach($cartItems as $item)
        <div class="col-md-4">
            <div class="card h-100">
                <div class="position-relative">
                    <img src="{{ asset('storage/' . $item->product->image) }}" class="card-img-top p-3" alt="{{ $item->product->name }}" style="height: 200px; object-fit: contain;">
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold mb-1">{{ $item->product->name }}</h5>
                    <p class="text-muted small mb-2">
                        <span class="material-symbols-outlined align-middle me-1" style="font-size: 16px;">sell</span>
                        {{ $item->product->category }}
                    </p>
                    <p class="text-primary fw-bold mb-2">₹{{ $item->product->price }}</p>
                    <p class="card-text text-muted mb-3">{{ Str::limit($item->product->desc, 100) }}</p>
                    <div class="mt-auto">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <span class="text-muted small">
                                <span class="material-symbols-outlined align-middle me-1" style="font-size: 16px;">person</span>
                                {{ $item->product->user_name }}
                            </span>
                        </div>
                        <form action="{{ route('removeFromCart', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <span class="material-symbols-outlined align-middle me-1">remove_shopping_cart</span>
                                Remove from Wishlist
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
{{-- Hide errors automatic --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        setTimeout(function() {
            let alertBox = document.getElementById("alertMessage");
            if (alertBox) {
                alertBox.style.transition = "opacity 0.5s";
                alertBox.style.opacity = "0";
                setTimeout(() => alertBox.remove(), 500); // Remove element after fade out
            }
        }, 3000); // 3 seconds delay
    });
</script>
@endsection
