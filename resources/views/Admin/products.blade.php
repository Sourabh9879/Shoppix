@extends('layouts.admlayout')

@section('title', 'Products')

@section('heading', 'Products List')

@section('name', session('name'))

@section('content')
<style>
.btn{
    padding:0px;
}
</style>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Seller</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $index => $product)
        <tr>
            <th scope="row">{{$index + 1}}</th>
            <td>{{$product->name}}</td>
            <td>₹{{$product->price}}</td>
            <td>{{$product->category}}</td>
            <td>{{$product->user_name}}</td>
            <td>
                <form action="{{ route('DeleteProduct', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn"><span class="material-symbols-outlined">
                            delete
                        </span></button>
                </form>
            </td>
            @endforeach
        </tr>
    </tbody>
</table>

@endsection