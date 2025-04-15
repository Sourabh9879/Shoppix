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

    .sidebar .d-flex.active {
        background-color: #374151;
        /* Highlight color */
        color: white;
    }

    .sidebar .d-flex.active a {
        color: white;
        font-weight: bold;
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
        padding: 0 20px 20px 20px;  /* Remove top padding */
        margin-left: 250px;
        overflow-y: auto;
        height: 100vh;
    }

    /* Header */
    .header {
        background-color: #1f2937;
        color: white;
        padding: 4px 12px;  /* Reduced padding */
        border-radius: 0;   /* Remove border radius */
        margin-bottom: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        position: sticky;   /* Make header sticky */
        top: 0;
        z-index: 1000;
    }

    .header h2 {
        font-size: 1rem;  /* Smaller font size */
        margin: 0;
    }

    .header .user-info {
        display: flex;
        align-items: center;
        gap: 6px;         /* Reduced gap */
        background: #374151;
        padding: 2px 10px;  /* Reduced padding */
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .header .user-info img {
        width: 24px;      /* Smaller image */
        height: 24px;
        border-radius: 50%;
        border: 1px solid #4b5563;
    }

    .header .user-info .material-symbols-outlined {
        font-size: 18px;  /* Smaller icon */
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
            padding: 0;
        }

        .content > *:not(.header) {
            padding: 15px;  /* Add padding to content except header */
        }

        /* Add hamburger menu styles */
        .hamburger-menu {
            position: static;
            display: block;
            margin-right: 15px;
            background: transparent;
            border: none;
            padding: 0;
            cursor: pointer;
            width: 24px;
            height: 24px;
        }

        .hamburger-menu .bar {
            display: block;
            width: 20px;
            height: 2px;
            background-color: #ffffff;
            margin: 4px 0;
            transition: all 0.3s ease;
            border-radius: 2px;
        }

        .hamburger-menu.active .bar:nth-child(1) {
            transform: translateY(6px) rotate(45deg);
        }

        .hamburger-menu.active .bar:nth-child(2) {
            opacity: 0;
        }

        .hamburger-menu.active .bar:nth-child(3) {
            transform: translateY(-6px) rotate(-45deg);
        }

        /* Add overlay styles */
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
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Admin Dashboard</h4>
        <div class="d-flex {{ Route::currentRouteName() == 'admdash' ? 'active' : '' }}">
            <span class="material-symbols-outlined">home</span>
            <a href="{{ route('admdash') }}">Dashboard</a>
        </div>
        <div class="d-flex {{ Route::currentRouteName() == 'admproducts' ? 'active' : '' }}">
            <span class="material-symbols-outlined">format_list_bulleted</span>
            <a href="{{ route('admproducts') }}">Products</a>
        </div>
        <div class="d-flex {{ Route::currentRouteName() == 'admuser' ? 'active' : '' }}">
            <span class="material-symbols-outlined">manage_accounts</span>
            <a href="{{ route('admuser') }}">Users</a>
        </div>
        <div class="d-flex {{ Route::currentRouteName() == 'admprofile' ? 'active' : '' }}">
            <span class="material-symbols-outlined">account_circle</span>
            <a href="{{ route('admprofile', ['id' => session('user_id')]) }}">Profile</a>
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
            <!-- Add hamburger menu -->
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

    <!-- Add overlay div after sidebar -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerMenu = document.getElementById('hamburgerMenu');
            const sidebar = document.querySelector('.sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            function toggleSidebar() {
                sidebar.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
                hamburgerMenu.classList.toggle('active');
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
                    hamburgerMenu.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>