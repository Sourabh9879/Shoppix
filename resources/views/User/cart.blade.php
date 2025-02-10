
@extends('layouts.layout')

@section('title', 'Cart')

@section('heading', 'Cart')

@section('name', session('name'))

@section('content')
<div class="container">
    <div class="row">
        @if($cartItems->isEmpty())
            <div class="col-12">
                <p>Your cart is empty.</p>
            </div>
        @else
            @foreach($cartItems as $item)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $item->product->image) }}" class="card-img-top" alt="{{ $item->product->name }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->product->name }}</h5>
                            <p class="card-text">₹{{ $item->product->price }}</p>
                            <form action="{{ route('removeFromCart', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection