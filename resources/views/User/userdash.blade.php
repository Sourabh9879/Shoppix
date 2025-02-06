@extends('layouts.layout')

@section('title', 'User Dashboard')

@section('heading', 'Welcome to your Dashboard')

@section('name', session('name'))

@section('content')
    <p>This is the user dashboard content area.</p>
@endsection