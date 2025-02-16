@extends('layouts.admlayout')

@section('title', 'Products')

@section('heading', 'Products List')

@section('name', session('name'))

@section('content')
    <div class="card shadow-sm p-4">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Seller</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->name }}</td>
                    <td>₹{{ $product->price }}</td>
                    <td>{{ $product->category }}</td>
                    <td>{{ $product->user_name }}</td>
                    <td>
                        <form action="{{ route('DeleteProduct', $product->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
