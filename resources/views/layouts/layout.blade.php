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
            background-color: #212529;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .sidebar h4 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 12px 15px;
            display: flex;
            align-items: center;
            border-radius: 5px;
            transition: background 0.3s ease-in-out;
            font-size: 1rem;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .sidebar span {
            margin-right: 10px;
            font-size: 1.4rem;
        }

        /* Content */
        .content {
            flex: 1;
            padding: 20px;
        }

        /* Header */
        .header {
            background-color: #212529;
            color: white;
            padding: 15px 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 1.75rem;
        }

        .header .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header .user-info img {
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        /* Sidebar Links */
        .sidebar .d-flex {
            align-items: center;
            padding: 10px;
            border-radius: 5px;
            transition: background 0.3s;
        }

        .sidebar .d-flex:hover {
            background-color: #495057;
        }

        .sidebar .d-flex:hover a,
        .sidebar .d-flex:hover .material-symbols-outlined {
            color: #fff;
        }

        /* Logout Button */
        .sidebar .logout {
            background-color: #dc3545;
            color: white;
            padding: 10px 15px;
            width: 100%;
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
            transition: background 0.3s;
        }

        .sidebar .logout:hover {
            background-color: #c82333;
        }

        /* Profile Link */
        .non {
            text-decoration: none;
            color: #fff;
        }

        .non:hover {
            text-decoration: none;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>User Dashboard</h4>

        <div class="d-flex">
            <span class="material-symbols-outlined">home</span>
            <a href="{{ route('myproducts') }}">Dashboard</a>
        </div>

        <div class="d-flex">
            <span class="material-symbols-outlined">format_list_bulleted</span>
            <a href="{{ route('userproducts') }}">Products</a>
        </div>

        @if(session('status') === 1)
        <div class="d-flex">
            <span class="material-symbols-outlined">add_task</span>
            <a href="{{ route('addProduct') }}">Add Product</a>
        </div>
        @endif

        <div class="d-flex">
            <span class="material-symbols-outlined">shopping_cart</span>
            <a href="{{ route('cart') }}">Cart</a>
        </div>

        <!-- Uncomment this section if needed -->
        <!-- 
        <div class="d-flex">
            <span class="material-symbols-outlined">production_quantity_limits</span>
            <a href="{{ route('myproducts') }}">My Products</a>
        </div> 
        -->

        <div class="d-flex">
            <span class="material-symbols-outlined">manage_accounts</span>
            <a href="{{ route('profile',['id' => session('user_id')]) }}">Profile</a>
        </div>

        <div class="d-flex">
            <a href="{{ route('logout') }}" class="logout">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content">
        <div class="header">
            <h1>@yield('heading')</h1>
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
