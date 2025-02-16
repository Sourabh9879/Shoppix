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

        /* Table */
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        .table thead {
            background: #343a40;
            color: white;
        }

        .table tbody tr:hover {
            background: rgba(0, 0, 0, 0.05);
        }

        /* Buttons */
        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px 10px;
            font-size: 14px;
            border-radius: 5px;
        }

        /* Alerts */
        .alert {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            border-radius: 5px;
            max-width: 500px;
            margin: 10px auto;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <h4>Admin Dashboard</h4>
        <a href="{{ route('admdash') }}"><span class="material-symbols-outlined">home</span> Dashboard</a>
        <a href="{{ route('admproducts') }}"><span class="material-symbols-outlined">format_list_bulleted</span> Products</a>
        <a href="{{ route('admuser') }}"><span class="material-symbols-outlined">manage_accounts</span> Users</a>
        <a href="{{ route('admprofile', ['id' => session('user_id')]) }}"><span class="material-symbols-outlined">account_circle</span> Profile</a>
        <a href="{{ route('logout') }}" class="btn btn-danger mt-auto"><span class="material-symbols-outlined">logout</span> Logout</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <!-- Header -->
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
