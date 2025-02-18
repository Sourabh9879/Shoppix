@extends('layouts.admlayout')

@section('title', 'Products')

@section('heading', 'Products List')

@section('name', session('name'))

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col">Name</th>
                            <th scope="col" class="text-end">Price</th>
                            <th scope="col">Category</th>
                            <th scope="col">Seller</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $product)
                        <tr class="align-middle">
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td class="text-end">₹{{ $product->price }}</td>
                            <td>{{ $product->category }}</td>
                            <td>{{ $product->user_name }}</td>
                            <td class="text-center">
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
        </div>
    </div>
</div>
@endsection
