<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Sidebar Styling -->
    <style>
        body {
            background-color: #f5f5f5;
        }

        .sidebar {
            background: #343a40;
            color: white;
            min-height: 100vh;
        }

        .sidebar h5 {
            padding-top: 20px;
            padding-bottom: 10px;
            text-align: center;
            border-bottom: 1px solid #555;
        }

        .sidebar a {
            color: #ddd;
            display: block;
            padding: 10px 20px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #495057;
            color: #fff;
        }

        .right-sidebar {
            background: #e9ecef;
            min-height: 100vh;
            border-left: 1px solid #ccc;
        }

        .right-sidebar h5 {
            padding: 15px;
            border-bottom: 1px solid #ccc;
        }

        .right-sidebar p {
            padding: 0 15px;
        }

        main {
            padding: 40px 20px;
            background-color: white;
            min-height: 100vh;
        }
    </style>

    {{-- Optional if using Vite --}}
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js'])  --}}
</head>
<body>
    <div class="container-fluid">
        <div class="row">

            <!-- Left Sidebar -->
            <div class="col-md-2 sidebar">
                <h5>Navigation</h5>
                <a href="/">🏠 Home</a>
                {{-- <a href="#">🔍 Explore</a>
                <a href="#">📨 Messages</a>
                <a href="#">👤 Profile</a>
                <a href="#">⚙️ Settings</a> --}}
            </div>

            <!-- Main Content -->
            <main class="col-md-8">
                @yield('content')
            </main>

            <!-- Right Sidebar -->
            <div class="col-md-2 right-sidebar">
                <h5>Quick Info</h5>
                <p>🔐 Secure Login</p>
                <p>💡 Tip: Use a strong password</p>
                <p>🕒 Support: 9AM - 5PM</p>
                <hr>
                <p class="text-muted small">Tweety © {{ now()->year }}</p>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
