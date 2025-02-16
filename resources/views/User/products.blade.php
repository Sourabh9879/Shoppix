@extends('layouts.layout')

@section('title', 'Products')

@section('heading', 'Products')

@section('name', session('name'))

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="width: 100%; height: 200px; object-fit: contain;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text text-danger fw-bold">₹{{ $product->price }}</p>
                    <p class="card-text">{{ Str::limit($product->desc, 100) }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Category: {{ $product->category }}</li>
                    <li class="list-group-item">Seller: {{ $product->user_name }}</li>
                </ul>
                <div class="card-body">
                    @if($product->user_id !== session('user_id'))
                        @if(session('status') == true)
                            <form action="{{ route('addToCart', $product->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                            </form>
                        @else
                            <p class="text-danger text-center font-weight-bold">You are blocked. Contact admin.</p>
                        @endif
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
