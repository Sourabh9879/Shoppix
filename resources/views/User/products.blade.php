@extends('layouts.layout')

@section('title', 'Products')

@section('heading', 'Products')

@section('name', session('name'))

@section('content')
<div class="container">
    <style>
        .card {
            border: 2px solid #808080;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            height: 100%;
        }

        .card-img-top {
            width: 100%;
            height: 200px;
            object-fit: contain;
        }

        .card-body {
            padding: 15px;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.25em;
            font-weight: bold;
        }

        .card-text {
            font-size: 1em;
            color: #757575;
            flex-grow: 1;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">₹{{ $product->price }}</p>
                    <p class="card-text">{{ Str::limit($product->desc, 100) }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Category: {{ $product->category }}</li>
                    <li class="list-group-item">Seller: {{ $product->user_name }}</li>
                </ul>
                <div class="card-body">
                    @if($product->user_id !== session('user_id'))
                        <a href="{{ route('viewProduct', $product->id) }}" class="card-link btn btn-primary">View</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
