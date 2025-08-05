<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Include admin-specific CSS --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body class="admin-body">

    <div class="admin-sidebar">
        @include('admin.partials.sidebar')
    </div>

    <div class="admin-content">
        @include('admin.partials.header')

        <main class="p-4">
            @yield('content')
        </main>
    </div>

    {{-- Include admin JS --}}
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
