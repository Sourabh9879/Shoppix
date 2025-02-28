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

.table> :not(caption)>*>* {
    padding: 1rem;
}

.card:hover {
    transform: none !important;
    transition: none !important;
}
.abc{
    width:100px;
    margin-left:20px;
}
.badge{
    font-size:1em;
}
.action-buttons {
    display: flex;
    gap: 10px;
    justify-content: center;
}
</style>
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th>Sr No.</th>
                            <th>Product</th>
                            <th>Customer Name</th>
                            <th>Requested Price</th>
                            <th>Original Price</th>
                            <th>Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($offers as $index => $offer)
                        <tr class="align-middle">
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('storage/' . $offer->product_image) }}" alt="Product Image"
                                        class="rounded me-2" style="width: 80px; height: 80px; object-fit: cover;">
                                    <span>{{ $offer->product_name }}</span>
                                </div>
                            </td>
                            <td>{{ $offer->name }}</td>
                            <td class="text-primary">₹{{ $offer->offer_price }}</td>
                            <td class="text-primary">₹{{ $offer->price }}</td>
                            <td>{{ \Carbon\Carbon::parse($offer->created_at)->format('d M Y') }}</td>
                            <td class="text-center">
                                @if($offer->status == 'pending')
                                <div class="action-buttons">
                                    <a href="{{ route('accept',['id' => $offer->product_id ]) }}" class="btn btn-primary">Accept</a>
                                    <a href="{{ route('reject',['id' => $offer->product_id ]) }}" class="btn btn-danger">Reject</a>
                                </div>
                                @elseif($offer->status == 'accepted')
                                <div class="action-buttons">
                                    <span class="badge bg-success">Accepted</span>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $offer->id }}">
                                        Edit
                                    </button>
                                </div>
                                @else
                                <div class="action-buttons">
                                    <span class="badge bg-danger">Rejected</span>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#editModal{{ $offer->id }}">
                                        Edit
                                    </button>
                                </div>
                                @endif
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="editModal{{ $offer->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $offer->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editModalLabel{{ $offer->id }}">Edit Response</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        @if($offer->status == 'rejected')
                                        <a href="{{ route('accept',['id' => $offer->product_id ]) }}" class="btn btn-primary abc">Accept</a>
                                        @elseif($offer->status == 'accepted')
                                        <a href="{{ route('reject',['id' => $offer->product_id ]) }}" class="btn btn-danger abc">Reject</a>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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