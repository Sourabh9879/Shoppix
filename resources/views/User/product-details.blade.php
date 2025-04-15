@extends('layouts.layout')

@section('title', $product->name)
@section('heading', 'Product Details')
@section('name', session('name'))

@section('content')
@if (session('success'))
<div class="alert alert-success" id="alertMessage">
    {{ session('success') }}
</div>
@endif
@if (session('failed'))
<div class="alert alert-danger" id="alertMessage">
    {{ session('failed') }}
</div>
@endif
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <!-- Product Image -->
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="img-fluid rounded" style="width: 100%; height: 400px; object-fit: contain;">
                </div>

                <!-- Product Details -->
                <div class="col-md-6">
                    <h2 class="mb-3">{{ $product->name }}
                        @if($product->user_id !== session('user_id'))
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#reportModal">
                            <span class="material-symbols-outlined caution-symbol">warning</span>
                        </button>
                        @endif
                    </h2>

                    <div class="mb-4">
                        <h3 class="text-primary mb-0">₹{{ $product->price }}</h3>
                    </div>

                    <div class="mb-3">
                        <div class="d-flex align-items-center text-muted mb-2">
                            <span class="material-symbols-outlined me-2">sell</span>
                            <span>{{ $product->category }}</span>
                        </div>
                        <div class="d-flex align-items-center text-muted mb-2">
                            <span class="material-symbols-outlined me-2">person</span>
                            <span>{{ $product->user_name }}</span>
                        </div>
                        <div class="d-flex align-items-center text-muted mb-2">
                            <span class="material-symbols-outlined me-2">calendar_month</span>
                            <span>Posted on: {{ $product->created_at->format('d M Y') }}</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>Description</h5>
                        <p class="text-muted">{{ $product->desc }}</p>
                    </div>

                    <div class="d-grid gap-2">
                        @if($product->user_id !== session('user_id'))
                        @if(session('status') == true)
                        @if($isSold)
                        <div class="text-center text-danger">Sold</div>
                        @elseif(isset($offer) && $offer->status == 'pending')
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Make an Offer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <!-- Product Summary -->
                <div class="product-summary mb-4 d-flex align-items-center gap-3">
                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                        class="product-thumbnail">
                    <div>
                        <h6 class="mb-1">{{ $product->name }}</h6>
                        <p class="mb-1 text-primary fw-bold">₹{{ $product->price }}</p>
                        <small class="text-muted d-flex align-items-center">
                            <span class="material-symbols-outlined me-1" style="font-size: 16px;">person</span>
                            {{ $product->user_name }}
                        </small>
                    </div>
                </div>

                <!-- Offer Form -->
                <form id="offerForm" action="{{ route('storeOffer') }}" method="POST" autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label small fw-bold">Name</label>
                        <input type="text" class="form-control form-control-sm" value="{{ session('name') }}" readonly>
                        <input type="hidden" name="name" value="{{ session('name') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Phone</label>
                        <input type="tel" class="form-control form-control-sm" value="{{ $user->phone }}" readonly>
                        <input type="hidden" name="phone" value="{{ $user->phone }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Email</label>
                        <input type="email" class="form-control form-control-sm" value="{{ $user->email }}" readonly>
                        <input type="hidden" name="email" value="{{ $user->email }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Your Offer Amount (₹)</label>
                        <input type="number" name="offer_price" class="form-control form-control-sm" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold">Message (Optional)</label>
                        <textarea name="message" class="form-control form-control-sm" rows="2" 
                            placeholder="Write a message to the seller..."></textarea>
                    </div>

                    <!-- Hidden fields -->
                    <input type="hidden" name="seller_name" value="{{ $product->user_name }}">
                    <input type="hidden" name="seller_id" value="{{ $product->user_id }}">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="user_id" value="{{ session('user_id') }}">
                    <input type="hidden" name="price" value="{{ $product->price }}">
                    <input type="hidden" name="product_image" value="{{ $product->image }}">
                    <input type="hidden" name="product_name" value="{{ $product->name }}">

                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm">Send Offer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Report Modal -->
<form id="reportForm" action="{{ route('ReportUser', ['id' => $product->user_id]) }}" method="POST">
    @csrf
    <input type="hidden" name="hasError" value="{{ $errors->has('message') ? 'true' : 'false' }}">
    <div class="modal fade @if($errors->has('message')) show @endif" id="reportModal" tabindex="-1"
        aria-labelledby="reportModalLabel" aria-hidden="true" @if($errors->has('message')) style="display: block;"
        @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="reportModalLabel">Report User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to report <span class="nme">{{ $product->user_name }}</span>?
                </div>
                <div class="modal-body">
                    <label for="message" class="form-label fw-bold">Reason For Report</label>
                    <textarea class="form-control" id="message" name="message"></textarea>
                    <span style="color:red">@error('message'){{ $message }}@enderror</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Report</button>
                </div>
            </div>
        </div>
    </div>
</form>

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

.caution-symbol {
    position: absolute;
    top: 0;
    right: 0;
    font-size: 30px;
    color: red;
    margin-right: 10px;
    padding-top: 10px;
}

.nme {
    font-weight: bold;
    font-size: 1.2em;
}

.product-thumbnail {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 4px;
}

.modal-dialog {
    max-width: 400px;
}

.modal-content {
    border: none;
    border-radius: 8px;
}

.modal-header {
    padding: 12px 16px;
    border-bottom: 1px solid #eee;
}

.modal-body {
    padding: 16px;
}

.form-control {
    border: 1px solid #ddd;
}

.form-control:read-only {
    background-color: #f8f9fa;
}

.form-control-sm {
    padding: 0.4rem 0.7rem;
    font-size: 0.875rem;
}

.btn-sm {
    padding: 0.4rem 1rem;
}

@media (max-width: 576px) {
    .modal-dialog {
        margin: 1rem;
    }
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
    setTimeout(function() {
        let alertBox = document.getElementById("alertMessage");
        if (alertBox) {
            alertBox.style.transition = "opacity 0.5s";
            alertBox.style.opacity = "0";
            setTimeout(() => alertBox.remove(), 500);
        }
    }, 3000);
});
</script>
@endsection