@extends('layouts.admlayout')

@section('title', 'Users')

@section('heading', 'Users List')

@section('name', session('name'))

@section('content')
    <div class="card shadow-sm p-4">
        <table class="table table-hover table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $index => $user)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="d-flex justify-content-center gap-2">
                        <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <span class="material-symbols-outlined">delete</span>
                            </button>
                        </form>
                        @if($user->status)
                            <a href="{{ route('BlockUser', $user->id) }}" class="btn btn-warning btn-sm">Block</a>
                        @else
                            <a href="{{ route('UnBlockUser', $user->id) }}" class="btn btn-success btn-sm">Unblock</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
