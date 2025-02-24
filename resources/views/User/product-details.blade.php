@extends('layouts.layout')

@section('title', $product->name)
@section('heading', 'Product Details')
@section('name', session('name'))

@section('content')
@if (session('success'))
    <div class="alert alert-success" id="alertMessage">{{ session('success') }}</div>
@endif
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $product->image) }}" 
                         alt="{{ $product->name }}" 
                         class="img-fluid rounded"
                         style="width: 100%; height: 400px; object-fit: contain;">
                </div>
                
                <!-- Product Details -->
                <div class="col-md-6">
                    <h2 class="mb-3">{{ $product->name }}</h2>
                    
                    <div class="mb-4">
                        <h3 class="text-primary mb-0">₹{{ $product->price }}</h3>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center text-muted mb-2">
                            <span class="material-symbols-outlined me-2">sell</span>
                            <span>{{ $product->category }}</span>
                        </div>
                        <div class="d-flex align-items-center text-muted">
                            <span class="material-symbols-outlined me-2">person</span>
                            <span>{{ $product->user_name }}</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>Description</h5>
                        <p class="text-muted">{{ $product->desc }}</p>
                    </div>

                    <div class="d-grid gap-2">
                        @if($product->user_id !== session('user_id'))
                            @if(session('status') == true)
                                @if(isset($offer) && $offer->status == 'pending')
                                    <div class="text-center text-warning">Pending</div>
                                @elseif(isset($offer) && $offer->status == 'accepted')
                                    <div class="text-center text-success">Accepted</div>
                                @else
                                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#offerModal">
                                        <span class="material-symbols-outlined align-middle me-2">handshake</span>
                                        Make offer
                                    </button>
                                @endif
                                <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-primary w-100">
                                        <span class="material-symbols-outlined align-middle me-2">favorite</span>
                                        Add to Wishlist
                                    </button>
                                </form>
                            @else
                                <div class="text-danger text-center">Account Freezed</div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Offer Modal -->
<div class="modal fade" id="offerModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header py-2">
                <h5 class="modal-title fs-6">Make an Offer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row g-4">
                    <!-- Left Column -->
                    <div class="col-5">
                        <div class="product-summary bg-light rounded p-3 h-100">
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}"
                                 class="rounded w-100 mb-3"
                                 style="height: 120px; object-fit: contain;">
                            <h6 class="mb-2">{{ $product->name }}</h6>
                            <p class="mb-0 text-primary fw-bold fs-5">₹{{ $product->price }}</p>
                            <span class="text-muted small">
                                <span class="material-symbols-outlined align-middle me-1" style="font-size: 16px;">person</span>
                                {{ $product->user_name }}
                            </span>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-7">
                        <form id="offerForm" action="{{ route('storeOffer') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="{{ session('name') }}" readonly>
                                    <input type="hidden" name="name" value="{{ session('name') }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <input type="tel" class="form-control" value="{{ $user->phone }}" readonly>
                                    <input type="hidden" name="phone" value="{{ $user->phone }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                                    <input type="hidden" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Offer Amount (₹)</label>
                                    <input type="number" name="offer_price" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Message</label>
                                    <textarea name="message" class="form-control" rows="2" placeholder="Write a message..."></textarea>
                                </div>
                                <!-- Hidden fields for seller's information -->
                                <input type="hidden" name="seller_name" value="{{ $product->user_name }}">
                                <input type="hidden" name="seller_id" value="{{ $product->user_id }}">
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                                <input type="hidden" name="price" value="{{ $product->price }}">
                                <input type="hidden" name="product_image" value="{{ $product->image }}">
                                <input type="hidden" name="product_name" value="{{ $product->name }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Send Offer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.modal-lg {
    max-width: 800px;
}
.modal-content {
    border-radius: 8px;
}
.product-summary {
    height: 100%;
}
.form-control {
    padding: 0.5rem 0.75rem;
}
.btn {
    padding: 0.5rem 1.5rem;
}
</style>
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