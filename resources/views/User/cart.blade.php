@extends('layouts.layout')

@section('title', 'Cart')

@section('heading', 'Cart')

@section('name', session('name'))

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success d-flex align-items-center justify-content-center" style="max-width: 400px;">
        <span class="material-symbols-outlined me-1">
            check_circle
        </span>
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
    @if (session('info'))
    <div class="alert alert-success d-flex align-items-center justify-content-center" style="max-width: 400px;">
        <span class="material-symbols-outlined me-1">
            check_circle
        </span>
        {{ session('info') }}
    </div>
    @endif
    <div class="row">
        @if($cartItems->isEmpty())
        <div class="col-12">
            <p>Your cart is empty.</p>
        </div>
        @else
        @foreach($cartItems as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $item->product->image) }}" class="card-img-top"
                    alt="{{ $item->product->name }}" style="width: 100%; height: 250px; object-fit: contain;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->product->name }}</h5>
                    <p class="card-text">₹{{ $item->product->price }}</p>
                    <form action="{{ route('removeFromCart', $item->id) }}" method="POST" class="mt-auto">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn"><span class="material-symbols-outlined">
                                delete
                            </span></button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>
@endsection
