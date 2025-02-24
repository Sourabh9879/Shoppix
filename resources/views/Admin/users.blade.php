@extends('layouts.admlayout')

@section('title', 'Users')

@section('heading', 'Users List')

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
                            <th scope="col">Email</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $user)
                        <tr class="align-middle">
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td class="text-center">
                                <span class="badge {{ $user->status ? 'bg-success' : 'bg-danger' }}">
                                    {{ $user->status ? 'Active' : 'Freezed' }}
                                </span>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center gap-2">
                                    <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <span class="material-symbols-outlined">delete</span>
                                        </button>
                                    </form>
                                    @if($user->status)
                                        <a href="{{ route('FreezeUser', $user->id) }}" class="btn btn-warning btn-sm">
                                            <span class="material-symbols-outlined">block</span>
                                        </a>
                                    @else
                                        <a href="{{ route('UnfreezeUser', $user->id) }}" class="btn btn-success btn-sm">
                                            <span class="material-symbols-outlined">check_circle</span>
                                        </a>
                                    @endif
                                </div>
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
