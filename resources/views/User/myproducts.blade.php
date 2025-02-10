@extends('layouts.layout')

@section('title', 'My Products')

@section('heading', 'My Products')

@section('name', session('name'))

@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">₹{{ $product->price }}</p>
                            <a href="{{ route('editProduct', $product->id) }}" class="btn btn-primary">Update</a>
                            <form action="{{ route('deleteProduct', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection