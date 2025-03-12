@extends('layouts.layout')

@section('title', 'Profile')

@section('heading', 'Profile')

@section('name', session('name'))

@section('content')

    <div class="container">
        <div class="row">
        <div class="col-6 d-flex align-items-end justify-content-end">
        <div class="card shadow-sm p-4" style="min-width: 555px">
                    
                    <!-- Success & Error Messages -->
                    @if (session('success'))
                        <div class="alert alert-success d-flex align-items-center" id="alertMessage">
                            <span class="material-symbols-outlined me-2">check_circle</span>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('failed'))
                        <div class="alert alert-danger d-flex align-items-center" id="alertMessage">
                            <span class="material-symbols-outlined me-2">warning</span>
                            {{ session('failed') }}
                        </div>
                    @endif
        
                    <!-- Profile Image -->
                    <div class="text-center">
                        <div class="position-relative d-inline-block">
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
                            <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" disabled>
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
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-6 d-flex align-items-start justify-content-start">
                    <div class="card shadow-sm p-4" style="min-width: 444px">
                        <h4 class="text-center">Change Password</h4>
                        <form action="{{ route('changePassword') }}" method="POST">
                            @csrf
            
                            <div class="mb-3">
                                <label for="old_password" class="form-label fw-bold">Old Password</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" required>
                            </div>
            
                            <div class="mb-3">
                                <label for="new_password" class="form-label fw-bold">New Password</label>
                                <input type="password" class="form-control" id="new_password" name="new_password" required>
                            </div>
            
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label fw-bold">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
            
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning w-100">Change Password</button>
                            </div>
                        </form>
                    </div>
            </div>
        </div>
    </div>


    <!-- Script for Image Preview -->
    <script>
        document.getElementById('imageUpload').addEventListener('change', function(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('profilePreview').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        });
    </script>
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                let alertBox = document.getElementById("alertMessage");
                if (alertBox) {
                    alertBox.style.transition = "opacity 0.5s";
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500); // Remove element after fade out
                }
            }, 3000); // 3 seconds delay
        });
    </script>

@endsection
