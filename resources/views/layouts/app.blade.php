<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style>

    <!-- Scripts -->
</head>
<body>
    <div id="app">

        <section class="px-8 py-4 mb-6">
            <header class="container mx-auto">
                <h1>
                    <img src="/images/logo.svg" alt="Tweety">
                </h1>
            </header>
        </section>
        <section class="px-8">
            <main class="container mx-auto">
                <div class="lg:flex lg:justify-between">
                    <div class="lg:w-32">
                        @include('partial._sidebar-links')
                    </div>
                    @yield('content')
                    <div class="lg:w-1/6 bg-blue-100 rounded-lg p-4">
                        @include('partial._friends-list')
                    </div>
                 </div>
            </main>
        </section>
    </div>
</body>
</html>
