@extends('layouts.layout')

@section('title', 'Profile')

@section('heading', 'Profile')

@section('name', session('name'))

@section('content')
    <p>This is the user profile area.</p>
@endsection