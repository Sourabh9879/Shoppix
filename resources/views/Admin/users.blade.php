@extends('layouts.admlayout')

@section('title', 'Users')

@section('heading', 'Users List')

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
            <td>
                <form action="{{ route('deleteUser', $user->id) }}" method="POST" class="m-8">
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