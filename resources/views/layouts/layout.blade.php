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
        padding: 8px 15px;
        border-radius: 5px;
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .header h2 {
        font-size: 1.2rem;
        margin: 0;
    }

    .header .user-info {
        display: flex;
        align-items: center;
        gap: 8px;
        background: #374151;
        padding: 4px 12px;
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .header .user-info img {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        border: 1px solid #4b5563;
    }

    .header .user-info .material-symbols-outlined {
        font-size: 20px;
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

    .sidebar .d-flex.active {
        background-color: #374151; /* Highlight color */
        color: white;
    }

    .sidebar .d-flex.active a {
        color: white;
        font-weight: bold;
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
            width: 60px;
            padding: 15px 5px;
            z-index: 1030;
        }

        .sidebar h4,
        .sidebar a span:not(.material-symbols-outlined) {
            display: none;
        }

        .sidebar .d-flex {
            justify-content: center;
            padding: 10px 5px;
        }

        .sidebar .logout span:not(.material-symbols-outlined) {
            display: none;
        }

        .content {
            margin-left: 60px;
            padding: 15px;
        }
    }

    /* Responsive Content */
    @media (max-width: 576px) {
        .header {
            flex-direction: row;
            gap: 8px;
            padding: 8px 15px 8px 60px;
        }

        .header h2 {
            font-size: 1.1rem;
        }

        .products-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }
    }

    /* Responsive Tables */
    @media (max-width: 768px) {
        .table-responsive {
            display: block;
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
    }

    /* Responsive Cards */
    @media (max-width: 576px) {
        .card {
            margin-bottom: 15px;
        }

        .stat-card {
            margin-bottom: 15px;
        }
    }

    /* Quick Actions Responsive */
    @media (max-width: 576px) {
        .d-flex.gap-2 {
            flex-wrap: wrap;
        }

        .d-flex.gap-2 .btn {
            width: calc(50% - 5px);
            margin-bottom: 10px;
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

    /* Updated Hamburger Menu Styles */
    .hamburger-menu {
        position: static;
        display: none;
        margin-right: 15px;
        top: auto;
        left: auto;
        background: transparent;  /* Remove any background */
        border: none;            /* Remove border */
        padding: 0;             /* Remove padding */
        cursor: pointer;
        width: 30px;
        height: 30px;
    }

    .hamburger-menu .bar {
        display: block;
        width: 25px;
        height: 2px;
        background-color: #ffffff;  /* Make bars white to show against dark header */
        margin: 5px 0;
        transition: all 0.3s ease;
        border-radius: 2px;
    }

    .hamburger-menu.active .bar:nth-child(1) {
        transform: translateY(7px) rotate(45deg);
    }

    .hamburger-menu.active .bar:nth-child(2) {
        opacity: 0;
    }

    .hamburger-menu.active .bar:nth-child(3) {
        transform: translateY(-7px) rotate(-45deg);
    }

    /* Mobile Responsive Styles */
    @media (max-width: 768px) {
        .hamburger-menu {
            display: block;
        }

        .header {
            padding: 8px 15px;
        }

        .sidebar {
            transform: translateX(-100%);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            z-index: 1035;
        }

        .sidebar.active {
            transform: translateX(0);
        }

        .content {
            margin-left: 0;
            padding: 60px 15px 15px 15px;
        }

        .sidebar h4,
        .sidebar a span:not(.material-symbols-outlined),
        .sidebar .logout span:not(.material-symbols-outlined) {
            display: inline;
        }

        .sidebar .d-flex {
            justify-content: flex-start;
            padding: 10px 15px;
        }

        /* Overlay when sidebar is open */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1034;
        }

        .sidebar-overlay.active {
            display: block;
        }
    }

    /* Add this to make hamburger white when in header */
    .header .hamburger-menu .bar {
        background-color: #ffffff;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Add Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="sidebar" id="sidebar">
        <h4>Shoppix</h4>
        <div class="d-flex {{ Route::currentRouteName() == 'userdash' ? 'active' : '' }}">
            <span class="material-symbols-outlined">home</span>
            <a href="{{ route('userdash') }}" class="">Dashboard</a>
        </div>
        <div class="d-flex {{ Route::currentRouteName() == 'myproducts' ? 'active' : '' }}">
            <span class="material-symbols-outlined">inventory</span>
            <a href="{{ route('myproducts') }}" class="">My Products</a>
        </div>

        <div class="d-flex {{ Route::currentRouteName() == 'userproducts' ? 'active' : '' }}">
            <span class="material-symbols-outlined">format_list_bulleted</span>
            <a href="{{ route('userproducts') }}">Products</a>
        </div>

        
        <div class="d-flex {{ Route::currentRouteName() == 'addProduct' ? 'active' : '' }}">
            <span class="material-symbols-outlined">add_task</span>
            <a href="{{ route('addProduct') }}">Sell</a>
        </div>
        

        <div class="d-flex {{ Route::currentRouteName() == 'cart' ? 'active' : '' }}">
            <span class="material-symbols-outlined">favorite</span>
            <a href="{{ route('cart') }}">Wishlist</a>
        </div>

        <div class="d-flex {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}">
            <span class="material-symbols-outlined">manage_accounts</span>
            <a href="{{ route('profile',['id' => session('user_id')]) }}">Profile</a>
        </div>
        <div class="d-flex {{ Route::currentRouteName() == 'offer' ? 'active' : '' }}">
            <span class="material-symbols-outlined">local_offer</span>
            <a href="{{ route('offer') }}">Offer</a>
        </div>
        <div class="d-flex position-relative {{ Route::currentRouteName() == 'message' ? 'active' : '' }}">
            <span class="material-symbols-outlined">mail</span>
            <a href="{{ route('message') }}" style="position: relative;">
                Message
                @if(auth()->user()->new_message > 0)
                <span
                class="ms-3"
                    style="background-color: red; color: white; border-radius: 50%; padding: 2px 7px; font-size: 14px; box-shadow: 0 0 10px rgba(255, 0, 0, 0.6);">
                    {{ auth()->user()->new_message }}
                </span>
                @endif
            </a>
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
            <!-- Add hamburger menu here as first element -->
            <button class="hamburger-menu" id="hamburgerMenu" aria-label="Menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
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

    <!-- Add this JavaScript before the closing body tag -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerMenu = document.getElementById('hamburgerMenu');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            function toggleSidebar() {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            }

            hamburgerMenu.addEventListener('click', toggleSidebar);
            sidebarOverlay.addEventListener('click', toggleSidebar);

            // Close sidebar when clicking a link (for mobile)
            const sidebarLinks = sidebar.querySelectorAll('a');
            sidebarLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth <= 768) {
                        toggleSidebar();
                    }
                });
            });

            // Handle window resize
            window.addEventListener('resize', () => {
                if (window.innerWidth > 768) {
                    sidebar.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>