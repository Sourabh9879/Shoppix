@extends('layouts.layout')

@section('title', 'Offers')
@section('heading', 'My Offers')
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
                            <th>Seller</th>
                            <th>Your Offer</th>
                            <th>Date</th>
                            <th class="text-center">Status</th>
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
                            <td>{{ $offer->seller_name }}</td>
                            <td class="text-primary">₹{{ $offer->amount }}</td>
                            <td>{{ \Carbon\Carbon::parse($offer->created_at)->format('d M Y') }}</td>
                            <td class="text-center">
                                @if($offer->status == 'pending')
                                    <span class="badge bg-warning">Pending</span>
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
                <h3 class="mt-3">No Offers Yet</h3>
                <p class="text-muted">You haven't made any offers yet</p>
                <a href="{{ route('userproducts') }}" class="btn btn-primary mt-3">Browse Products</a>
            </div>
            @endif
        </div>
    </div>
</div>


@endsection