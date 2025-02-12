@extends('layouts.admlayout')

@section('title', 'Users')

@section('heading', 'Users List')

@section('name', session('name'))

@section('content')
<style>
.btn {
    padding: 0px;
}
</style>
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $index => $user)
        <tr>
            <th scope="row">{{$index + 1}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td class="d-flex">
                <form action="{{ route('deleteUser', $user->id) }}" method="POST" class="m-8">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-1 pt-1"><span class="material-symbols-outlined">
                            delete
                        </span></button>
                </form>
                @if($user->status)
                        <a href="{{ route('BlockUser', $user->id) }}" class=" ml-2 btn btn-danger px-3 py-1">Block</a>
                    @else
                        <a href="{{ route('UnBlockUser', $user->id) }}" class="ml-2 btn btn-primary px-3 py-1">Unblock</a>
                    @endif
            </td>
            @endforeach
        </tr>
    </tbody>
</table>
@endsection