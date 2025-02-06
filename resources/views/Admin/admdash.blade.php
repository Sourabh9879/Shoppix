@extends('layouts.admlayout')

@section('title', 'Admin Dashboard')

@section('heading', 'Welcome to your Dashboard')

@section('name', session('name'))

@section('content')
    <p>This is the Admin dashboard area.</p>
@endsection