<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>@yield('title')</title>
    <style>
    body {
        display: flex;
        min-height: 100vh;
        margin: 0;
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
    }

    .sidebar {
        width: 250px;
        background-color: #343a40;
        color: #fff;
        display: flex;
        flex-direction: column;
        padding: 20px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
    }

    .sidebar h2 {
        text-align: center;
        margin-bottom: 20px;
        font-size: 1.5rem;
    }

    .sidebar a {
        color: #fff;
        text-decoration: none;
        padding: 10px 15px;
        margin: 5px 0;
        display: block;
        border-radius: 5px;
        transition: background-color 0.3s;
        position: relative;
    }

    .sidebar .d-flex:hover {
        background-color: #495057;
        border-radius: .8em;
    }

    .sidebar .d-flex:hover a,
    .sidebar .d-flex:hover .material-symbols-outlined {
        color: #fff;
    }

    .sidebar a:hover::after {
        content: '\f061'; 
        font-family: 'FontAwesome'; 
        position: absolute;
        right: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    .sidebar .logout {
        background-color: #dc3545;
        color: #fff;
        padding: 10px 15px;
        width: 50%;
    }

    .sidebar .logout:hover {
        background-color: #c82333;
    }

    .content {
        flex: 1;
        padding: 20px;
    }

    .header {
        background-color: #007bff;
        color: #fff;
        padding: 15px;
        text-align: center;
        border-radius: 5px;
        margin-bottom: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .header h1 {
        margin: 0;
        font-size: 1.75rem;
    }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>User Dashboard</h2>
        <div class="d-flex align-items-center justify-content-start pl-2">
            <span class="material-symbols-outlined">home </span>
            <a href="{{ route('userdash') }}">Dashboard</a>
        </div>
        <div class="d-flex align-items-center justify-content-start pl-2">
            <span class="material-symbols-outlined">home </span>
            <a href="{{ route('products') }}">Products</a>
        </div>
        <div class="d-flex align-items-center justify-content-start pl-2">
            <span class="material-symbols-outlined">home </span>
            <a href="{{ route('addProduct') }}">Add Product</a>
        </div>
        <div class="d-flex align-items-center justify-content-start pl-2">
            <span class="material-symbols-outlined">home </span>
            <a href="{{ route('profile') }}">Profile</a>
        </div>
        <a href="{{ route('logout') }}" class="logout">Logout</a>
    </div>
    <div class="content">
        <div class="header">
            <h1>@yield('header')</h1>
        </div>
        @yield('content')
    </div>
</body>

</html>