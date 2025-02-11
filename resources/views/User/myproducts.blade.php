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
    </style>

    @if (session('success'))
    <div class="alert alert-success d-flex align-items-center justify-content-center" style="max-width: 400px;">
        <span class="material-symbols-outlined me-1">check_circle</span>
        {{ session('success') }}
    </div>
    @endif
    @if (session('failed'))
    <div class="alert alert-danger d-flex align-items-center justify-content-center" style="max-width: 400px;">
        <span class="material-symbols-outlined me-1">
            warning
        </span>
        {{ session('failed') }}
    </div>
    @endif
    <div class="row">
        @if($products->isEmpty())
        <div class="col-12">
            <p>You Don't Have Added Any Product.</p>
        </div>
        @else
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">₹{{ $product->price }}</p>
                    <button type="button" class="btn" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $product->id }}">
                        <span class="material-symbols-outlined">edit</span>
                    </button>
                    <form action="{{ route('deleteProduct', $product->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editModal{{ $product->id }}" tabindex="-1"
            aria-labelledby="editModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $product->id }}">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><span
                                class="material-symbols-outlined">
                                close
                            </span></button>
                    </div>
                    <form action="{{ route('updateProduct', $product->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name{{ $product->id }}">Product Name</label>
                                <input type="text" class="form-control" id="name{{ $product->id }}" name="name"
                                    value="{{ $product->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category{{ $product->id }}">Category</label>
                                <select class="form-control" id="category{{ $product->id }}" name="category" required>
                                    <option value="Electronics"
                                        {{ $product->category == 'Electronics' ? 'selected' : '' }}>Electronics</option>
                                    <option value="Furniture" {{ $product->category == 'Furniture' ? 'selected' : '' }}>
                                        Furniture</option>
                                    <option value="Vehicles" {{ $product->category == 'Vehicles' ? 'selected' : '' }}>
                                        Vehicles</option>
                                    <option value="Real Estate"
                                        {{ $product->category == 'Real Estate' ? 'selected' : '' }}>Real Estate</option>
                                    <option value="Books" {{ $product->category == 'Books' ? 'selected' : '' }}>Books
                                    </option>
                                    <option value="Sports" {{ $product->category == 'Sports' ? 'selected' : '' }}>Sports
                                    </option>
                                    <option value="others" {{ $product->category == 'others' ? 'selected' : '' }}>others
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="price{{ $product->id }}">Price</label>
                                <input type="number" class="form-control" id="price{{ $product->id }}" name="price"
                                    value="{{ $product->price }}" required>
                            </div>
                            <div class="form-group">
                                <label for="desc{{ $product->id }}">Description</label>
                                <textarea class="form-control" id="desc{{ $product->id }}" name="desc"
                                    required>{{ $product->desc }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="image{{ $product->id }}">Image</label>
                                <input type="file" class="form-control" id="image{{ $product->id }}" name="image"
                                    accept=".jpg,.png,.jpeg">
                                <small class="form-text text-muted">Leave empty to keep the current image</small>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>

<!-- Make sure you have Bootstrap JS and its dependencies -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
@endsection