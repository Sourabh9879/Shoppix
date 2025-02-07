@extends('layouts.admlayout')

@section('title', 'Profile')

@section('heading', 'Profile')

@section('name', session('name'))

@section('content')
@if (session('success'))
        <div class="alert alert-success d-flex align-items-center justify-content-center" style="max-width: 400px;">
            <span class="material-symbols-outlined me-1">
                check_circle
            </span>
            {{ session('success') }}
        </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger d-flex align-items-center justify-content-center" style="max-width: 400px;">
            <span class="material-symbols-outlined me-1">
                warning
            </span>
            {{ session('failed') }}
        </div>
        @endif
    <form action="{{ route('updateProfile', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data" class="mx-auto" style="max-width: 600px;">
        @csrf
        @method('PUT')
        <div class="form-group text-center">
            @if ($data->image)
                <img src="{{ asset('storage/' . $data->image) }}" alt="Profile Image" class="rounded-circle img-thumbnail mb-3" style="width: 150px; height: 150px;">
            @else
                <img src="{{ asset('default-profile.png') }}" alt="Default Profile Image" class="rounded-circle img-thumbnail mb-3" style="width: 150px; height: 150px;">
            @endif
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required>
        </div>
        <div class="form-group">
            <label for="image">Profile Image</label>
            <input type="file" class="form-control-file" id="image" name="image" accept=".jpg,.png,.jpeg">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group text-center">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('admdash') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
@endsection