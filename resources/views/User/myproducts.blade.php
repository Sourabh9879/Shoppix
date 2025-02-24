@extends('layouts.layout')

@section('title', 'My Products')

@section('heading', 'My Products')

@section('name', session('name'))

@section('content')
<div class="container">
    <style>
    .modal-body .form-group {
        margin-bottom: 1rem;
    }

    .card-img-top {
        width: 100%;
        height: 250px;
        object-fit: contain;
    }
    .ra{
        border: 1px solid black;

    }
    .ra:hover{
        border: 2px solid black;
    }
    </style>

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
    @if($products->isEmpty())
    <div class="text-center py-5">
        <span class="material-symbols-outlined" style="font-size: 4rem; color: #9ca3af;">inventory</span>
        <h3 class="mt-3">You Have Not Added Any Products yet</h3>
        <a href="{{ route('addProduct') }}" class="btn btn-primary mt-3">Add Product</a>
    </div>
    @else
    <div class="row g-4">
        @foreach($products as $product)
        <div class="col-md-4">
            <div class="card h-100">
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
                        <div class="d-flex gap-2">
                            <button class="btn flex-grow-1 ra" data-bs-toggle="modal" data-bs-target="#editModal{{ $product->id }}">
                                <span class="material-symbols-outlined align-middle me-1">edit</span>
                                Edit
                            </button>
                            <form action="{{ route('deleteProduct', $product->id) }}" method="POST" class="flex-grow-1">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">
                                    <span class="material-symbols-outlined align-middle me-1">delete</span>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <select class="form-control" name="category" required>
                                    <option value="Electronics" {{ $product->category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="Furniture" {{ $product->category == 'Furniture' ? 'selected' : '' }}>Furniture</option>
                                    <option value="Vehicles" {{ $product->category == 'Vehicles' ? 'selected' : '' }}>Vehicles</option>
                                    <option value="Real Estate" {{ $product->category == 'Real Estate' ? 'selected' : '' }}>Real Estate</option>
                                    <option value="Books" {{ $product->category == 'Books' ? 'selected' : '' }}>Books</option>
                                    <option value="Sports" {{ $product->category == 'Sports' ? 'selected' : '' }}>Sports</option>
                                    <option value="Others" {{ $product->category == 'Others' ? 'selected' : '' }}>Others</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="number" class="form-control" name="price" value="{{ $product->price }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control" name="desc" required>{{ $product->desc }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" class="form-control" name="image" accept=".jpg,.png,.jpeg">
                                <small class="text-muted">Leave empty to keep current image</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
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
    });
</script>
@endsection