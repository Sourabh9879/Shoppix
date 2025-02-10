@extends('layouts.layout')

@section('title', 'My Products')

@section('heading', 'My Products')

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
    <div class="row">
    @if($products->isEmpty())
        <div class="col-12">
            <p>You Dont Have Added Any Product.</p>
        </div>
        @else
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}"
                    style="width: 100%; height: 250px; object-fit: contain;">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">₹{{ $product->price }}</p>
                    <a href="{{ route('editProduct', $product->id) }}" class="btn"><span
                            class="material-symbols-outlined">
                            edit
                        </span></a>
                    <form action="{{ route('deleteProduct', $product->id) }}" method="POST" class="d-inline">
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
