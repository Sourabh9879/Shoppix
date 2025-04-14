@extends('layouts.layout')

@section('title', 'Sell')

@section('heading', 'Sell')

@section('name', session('name'))

@section('content')
<div class="card mx-auto shadow-sm p-4" style="max-width: 600px;">
    <div class="card-body">
        <h3 class="text-center mb-3 text-primary">Add New Product</h3>

        <div id="alertMessage" style="display: none;"></div>

        <form action="{{ route('storeProduct') }}" method="POST" enctype="multipart/form-data" autocomplete="on">
            @csrf

            <div class="mb-3">
                <div class="mt-4 text-center" id="imagePreview" style="display: none;">
                    <img src="" alt="Preview" class="img-fluid" style="max-height: 200px; object-fit: contain;">
                </div>
                <label for="image" class="form-label fw-bold">Product Image</label>
                <input type="file" class="form-control" id="image" name="image" accept=".jpg,.png,.jpeg" required
                    onchange="previewImage(this)" autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label fw-bold">Product Name</label>
                <input type="text" class="form-control" id="name" name="name" required autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label fw-bold">Category</label>
                <select class="form-control" id="category" name="category" required autocomplete="off">
                    <option value="">Select Category</option>
                    <option value="Electronics">Electronics</option>
                    <option value="Furniture">Furniture</option>
                    <option value="Vehicles">Vehicles</option>
                    <option value="Real Estate">Real Estate</option>
                    <option value="Books">Books</option>
                    <option value="Sports">Sports</option>
                    <option value="Others">Others</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label fw-bold">Set A Price (₹)</label>
                <input type="number" class="form-control" id="price" name="price" max="99999999" required
                    autocomplete="off">
            </div>

            <div class="mb-3">
                <label for="desc" class="form-label fw-bold">Description</label>
                <textarea class="form-control" id="desc" name="desc" required autocomplete="off"></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Add Product</button>
            </div>
        </form>

    </div>
</div>

<!-- Add this script at the bottom of your content section -->
<script>
function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    const previewImg = preview.querySelector('img');

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            previewImg.src = e.target.result;
            preview.style.display = 'block';
        }

        reader.readAsDataURL(input.files[0]);
    } else {
        previewImg.src = '';
        preview.style.display = 'none';
    }
}

$(document).ready(function() {
    $('#addProductForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: '{{ route('
            storeProduct ') }}',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#alertMessage').removeClass('alert-danger').addClass(
                    'alert alert-success').text(response.message).show();
                $('#addProductForm')[0].reset();
                $('#imagePreview').hide();
            },
            error: function(response) {
                $('#alertMessage').removeClass('alert-success').addClass(
                    'alert alert-danger').text(response.responseJSON.message).show();
            }
        });
    });
});
</script>
@endsection