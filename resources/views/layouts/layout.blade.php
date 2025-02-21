<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Google Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">

    <style>
    body {
        display: flex;
        min-height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    /* Sidebar */
    .sidebar {
        width: 250px;
        background-color: #1f2937;
        color: white;
        display: flex;
        flex-direction: column;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s;
        position: fixed;
        height: 100%;
        overflow-y: auto;
    }

    .sidebar h4 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.5rem;
        font-weight: bold;
        color: #e5e7eb;
    }

    .sidebar a {
        color: #e5e7eb;
        text-decoration: none;
        padding: 12px 15px;
        display: flex;
        align-items: center;
        border-radius: 5px;
        transition: background 0.3s ease-in-out;
        font-size: 1rem;
    }

    .sidebar a:hover {
        background-color: #374151;
    }

    .sidebar span {
        margin-right: 10px;
        font-size: 1.4rem;
        color: #9ca3af;
    }

    /* Content */
    .content {
        flex: 1;
        padding: 20px;
        margin-left: 250px;
        /* Same as sidebar width */
        overflow-y: auto;
        height: 100vh;
    }

    /* Header */
    .header {
        background-color: #1f2937;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #374151;
        padding: 8px 15px;
        border-radius: 30px;
        transition: all 0.3s ease;
    }

    .header .user-info:hover {
        background: #4b5563;
    }

    .header .user-info img {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        border: 2px solid #4b5563;
    }

    /* Sidebar Links */
    .sidebar .d-flex {
        align-items: center;
        padding: 10px;
        border-radius: 5px;
        transition: background 0.3s;
    }

    .sidebar .d-flex:hover {
        background-color: #374151;
    }

    .sidebar .d-flex:hover a,
    .sidebar .d-flex:hover .material-symbols-outlined {
        color: #fff;
    }

    /* Logout Button */
    .sidebar .logout {
        background-color: #ef4444;
        color: white;
        padding: 10px 15px;
        width: 100%;
        text-align: center;
        border-radius: 5px;
        font-weight: bold;
        transition: all 0.3s;
        margin-top: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .sidebar .logout:hover {
        background-color: #dc2626;
        transform: translateY(-2px);
    }

    /* Card Styles */
    .card {
        border: none;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    /* Button Styles */
    .btn-primary {
        background-color: #3b82f6;
        border-color: #3b82f6;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #2563eb;
        border-color: #2563eb;
        transform: translateY(-2px);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .sidebar {
            width: 80px;
            padding: 1rem 0.5rem;
        }

        .sidebar h4,
        .sidebar-link span:not(.material-symbols-outlined) {
            display: none;
        }

        .sidebar-link {
            justify-content: center;
            padding: 0.875rem;
        }

        .sidebar-link .material-symbols-outlined {
            margin: 0;
            font-size: 1.5rem;
        }

        .content {
            padding: 1rem;
        }

        .header {
            padding: 1rem;
        }

        .user-info span:not(.material-symbols-outlined) {
            display: none;
        }
    }

    /* Product Card Styles */
    .product-card {
        background: white;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        overflow: hidden;
        transition: box-shadow 0.2s ease;
    }

    .product-card:hover {
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .product-card .image-container {
        position: relative;
        height: 200px;
        background: #f9fafb;
    }

    .product-card .image-container img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        padding: 1rem;
    }

    .product-card .badge {
        position: absolute;
        top: 12px;
        right: 12px;
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        background: #1f2937;
        color: white;
    }

    .product-card .card-content {
        padding: 16px;
    }

    .product-card .title {
        font-size: 16px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 8px;
    }

    .product-card .price {
        font-size: 18px;
        font-weight: 700;
        color: #2563eb;
        margin-bottom: 8px;
    }

    .product-card .description {
        font-size: 14px;
        color: #6b7280;
        margin-bottom: 16px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card .info {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 16px;
        background: #f9fafb;
        border-top: 1px solid #e5e7eb;
    }

    .product-card .category {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        color: #4b5563;
    }

    .product-card .seller {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 14px;
        color: #4b5563;
    }

    .product-card .actions {
        padding: 16px;
        border-top: 1px solid #e5e7eb;
    }

    .product-card .btn {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 8px 16px;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
    }

    .product-card .btn-group {
        display: flex;
        gap: 8px;
    }

    .product-card .btn-group .btn {
        flex: 1;
    }

    /* Product Grid */
    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        padding: 24px 0;
    }

    @media (max-width: 768px) {
        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 16px;
            padding: 16px 0;
        }
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <a href="{{ Route('userdash') }}">
            <h4>Dashboard</h4>
        </a>

        <div class="d-flex">
            <span class="material-symbols-outlined">inventory</span>
            <a href="{{ route('myproducts') }}" class="">My Products</a>
        </div>

        <div class="d-flex">
            <span class="material-symbols-outlined">format_list_bulleted</span>
            <a href="{{ route('userproducts') }}">Products</a>
        </div>

        @if(session('status') === 1)
        <div class="d-flex">
            <span class="material-symbols-outlined">add_task</span>
            <a href="{{ route('addProduct') }}">Sell</a>
        </div>
        @endif

        <div class="d-flex">
            <span class="material-symbols-outlined">shopping_cart</span>
            <a href="{{ route('cart') }}">Wishlist</a>
        </div>

        <div class="d-flex">
            <span class="material-symbols-outlined">manage_accounts</span>
            <a href="{{ route('profile',['id' => session('user_id')]) }}">Profile</a>
        </div>
        <div class="d-flex">
            <span class="material-symbols-outlined">
                local_offer
            </span>
            <a href="{{ route('offer') }}">Offers</a>
        </div>
        <div class="d-flex">
            <span class="material-symbols-outlined">
                chat
            </span>
            <a href="{{ route('message') }}">Message</a>
        </div>
        <div class="d-flex">
            <a href="{{ route('logout') }}" class="logout">
                <span class="material-symbols-outlined">logout</span> Logout
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="header">
            <h2>@yield('heading')</h2>
            <div class="user-info">
                @if(session('user_image'))
                <img src="{{ asset('storage/' . session('user_image')) }}" alt="User Image">
                @else
                <span class="material-symbols-outlined">account_circle</span>
                @endif
                <a href="" class="text-white">@yield('name')</a>
            </div>
        </div>

        @yield('content')
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>