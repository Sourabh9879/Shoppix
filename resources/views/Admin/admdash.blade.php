@extends('layouts.admlayout')

@section('title', 'Admin Dashboard')

@section('heading', 'Welcome to your Dashboard')

@section('name', session('name'))

@section('content')
    <div class="card shadow-sm p-4">
        <h2 class="text-center">Admin Dashboard</h2>
        <p class="text-muted text-center">Manage your users, products, and more.</p>
    </div>
@endsection
