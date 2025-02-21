@extends('layouts.layout')

@section('title', 'Message')
@section('heading', 'Messages')
@section('name', session('name'))

@section('content')
<style>
.badge {
    padding: 8px 12px;
    font-weight: 500;
}
.table > :not(caption) > * > * {
    padding: 1rem;
}
.card:hover {
    transform:none !important;
    transition:none !important;
}
</style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Product</th>
                            <th>Customer Name</th>
                            <th>Requested Price</th>
                            <th>Original Price</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offers ?? [] as $offer)
                        <tr class="align-middle">
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $offer->product_image) }}" 
                                         alt="Product Image"
                                         class="rounded me-2"
                                         style="width: 80px; height: 80px; object-fit: cover;">
                                    <span>{{ $offer->product_name }}</span>
                                </div>
                            </td>
                            <td>{{ $offer->name }}</td>
                            <td class="text-primary">₹{{ $offer->offer_price }}</td>
                            <td class="text-primary">₹{{ $offer->price }}</td>
                            <td>{{ \Carbon\Carbon::parse($offer->created_at)->format('d M Y') }}</td>
                            <td class="text-center">
                            @if($offer->status == 'pending')
                           <a href="{{ route('accept',['id' => $offer->product_id ]) }}" class="btn btn-primary">Accept</a>
                           <a href="{{ route('reject',['id' => $offer->product_id ]) }}" class="btn btn-danger">Reject</a>
                                @elseif($offer->status == 'accepted')
                                    <span class="badge bg-success">Accepted</span>
                                @else
                                    <span class="badge bg-danger">Rejected</span>
                                @endif
                             
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if(empty($offers) || count($offers) == 0)
            <div class="text-center py-5">
                <span class="material-symbols-outlined" style="font-size: 4rem; color: #9ca3af;">mail</span>
                <h3 class="mt-3">No Message Yet</h3>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection