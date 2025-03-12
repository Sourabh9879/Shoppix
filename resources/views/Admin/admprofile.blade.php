@extends('layouts.admlayout')

@section('title', 'Profile')

@section('heading', 'Profile')

@section('name', session('name'))

@section('content')

    <div class="container d-flex justify-content-center">
        <div class="card shadow-sm p-4" style="max-width: 600px; width: 100%;">
            
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

            <!-- Profile Form -->
            <form action="{{ route('upadmprofile', ['id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
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
                    <label for="imageUpload" class="form-label fw-bold">Profile Picture</label>
                    <input type="file" class="form-control" id="imageUpload" name="image" accept=".jpg,.png,.jpeg">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                    <a href="{{ route('admdash') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
                </div>
            </form>

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

@endsection
