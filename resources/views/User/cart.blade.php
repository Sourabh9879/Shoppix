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
        <span class="material-symbols-outlined" style="font-size: 4rem; color: #9ca3af;">favorite</span>
        <h3 class="mt-3">Your Wishlist is empty</h3>
        <p class="text-muted">Browse products and add items to your Wishlist</p>
        <a href="{{ route('userproducts') }}" class="btn btn-primary mt-3">Browse Products</a>
    </div>
    @else
    <div class="row g-4" id="cartItemsContainer">
        @foreach($cartItems as $item)
        <div class="col-md-4" id="cartItem{{ $item->id }}">
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
                        <button class="btn btn-danger w-100" data-bs-toggle="modal" data-bs-target="#removeModal" data-item-id="{{ $item->id }}">
                            <span class="material-symbols-outlined align-middle me-1">favorite</span>
                            Remove from Wishlist
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>

<!-- Remove Confirmation Modal -->
<div class="modal fade" id="removeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirm Remove</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to remove this item from your wishlist?
            </div>
            <div class="modal-footer">
                <form id="removeForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Remove</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Make sure you have Bootstrap JS and its dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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

        // Handle remove button click
        document.querySelectorAll('[data-bs-target="#removeModal"]').forEach(button => {
            button.addEventListener('click', function() {
                const itemId = this.getAttribute('data-item-id');
                const removeForm = document.getElementById('removeForm');
                removeForm.setAttribute('action', '{{ route('removeFromCart', '') }}/' + itemId);
            });
        });
    });
</script>
@endsection
