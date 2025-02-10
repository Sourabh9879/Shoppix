@extends('layouts.layout')

@section('title', 'Products')

@section('heading', 'Products')

@section('name', session('name'))

@section('content')
<div class="container">
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}"
                    style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">₹{{ $product->price }}</p>
                    @if($product->user_id !== session('user_id'))
                        <a href="{{ route('viewProduct', $product->id) }}" class="btn btn-primary">View</a>
                    @endif</div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection