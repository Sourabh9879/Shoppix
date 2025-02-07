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
            width: 233px;
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

        .sidebar .logout {
            background-color: #dc3545;
            color: #fff;
            padding: 10px 15px;
            width: 100%;
        }

        .sidebar .logout:hover {
            background-color: #c82333;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        .header {
            background-color: #343a40;
            color: #fff;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header h1 {
            margin: 0;
            font-size: 1.75rem;
        }

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
    <div class="sidebar">
        <h4>Admin Dashboard</h4>
        <div class="d-flex align-items-center justify-content-start pl-2">
            <span class="material-symbols-outlined">home</span>
            <a href="{{ route('admdash') }}">Dashboard</a>
        </div>
        <div class="d-flex align-items-center justify-content-start pl-2">
            <span class="material-symbols-outlined">format_list_bulleted</span>
            <a href="{{ route('admproducts') }}">Products</a>
        </div>
        <div class="d-flex align-items-center justify-content-start pl-2">
            <span class="material-symbols-outlined">
                manage_accounts
            </span>
            <a href="{{ route('admuser') }}">Users</a>
        </div>
         <div class="d-flex align-items-center justify-content-start pl-2">
            <span class="material-symbols-outlined">
                manage_accounts
            </span>
            <a href="{{ route('admprofile',['id' => session('user_id')]) }}">Profile</a>
        </div>
        <div class="d-flex align-items-center justify-content-start pl-2 ">
            <span class="material-symbols-outlined">logout</span>
            <a href="{{ route('logout') }}">Logout</a>
        </div>
    </div>
    <div class="content">
        <div class="header d-flex justify-content-between aligh-items-center">
            <h1>@yield('heading')</h1>
            <div class="d-flex justify-content-center aligh-items-center">
            @if(session('user_image'))
                <img src="{{ asset('storage/' . session('user_image')) }}" alt="User Image" class="rounded-circle mx-2"
                    style="width: 30px; height: 30px;">
                @else
                <span class="material-symbols-outlined mx-2 pt-1">account_circle</span>
                @endif
                <a href="" class="text-center pt-1 non">@yield('name')</a>

            </div>
        </div>
        @yield('content')
    </div>
</body>

</html>
