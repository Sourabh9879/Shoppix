@extends('layouts.layout')

@section('title', 'Profile')

@section('heading', 'Profile')

@section('name', session('name'))

@section('content')

    <div class="container d-flex justify-content-center">
        <div class="card shadow-sm p-4" style="max-width: 600px; width: 100%;">
            
            <!-- Success & Error Messages -->
            @if (session('success'))
                <div class="alert alert-success d-flex align-items-center">
                    <span class="material-symbols-outlined me-2">check_circle</span>
                    {{ session('success') }}
                </div>
            @endif
            @if (session('failed'))
                <div class="alert alert-danger d-flex align-items-center">
                    <span class="material-symbols-outlined me-2">warning</span>
                    {{ session('failed') }}
                </div>
            @endif

            <!-- Profile Image -->
            <div class="text-center">
                <div class="position-relative d-inline-block">
                    <!-- <label for="imageUpload" class="position-absolute bottom-0 end-0 bg-primary text-white p-1 rounded-circle" style="cursor: pointer;">
                        <span class="material-symbols-outlined">edit</span>
                    </label> -->
                    @if ($data->image)
                        <img id="profilePreview" src="{{ asset('storage/' . $data->image) }}" class="rounded-circle img-thumbnail mb-3" style="width: 120px; height: 120px;">
                    @else
                        <img id="profilePreview" src="{{ asset('default-profile.png') }}" class="rounded-circle img-thumbnail mb-3" style="width: 120px; height: 120px;">
                    @endif
                </div>
            </div>

            <!-- Profile Form -->
            <form action="{{ route('updateProfile', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone" class="form-label fw-bold">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $data->phone }}" required>
                    <span class="text-danger">@error('phone') {{ $message }} @enderror</span>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label fw-bold">Address</label>
                    <textarea class="form-control" id="address" name="address" required>{{ $data->address }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="imageUpload" class="form-label fw-bold">Profile Picture</label>
                    <input type="file" class="form-control" id="imageUpload" name="image" accept=".jpg,.png,.jpeg">
                    <small class="text-muted">Leave empty to keep the current image</small>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                    <a href="{{ route('userdash') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
                </div>
            </form>
        </div>
    </div>


@endsection
