<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-blue-600 text-white p-4">
        <div class="flex justify-center items-center">
            <a href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-10">
            </a>
        </div>
    </header>

    <main class="container mx-auto p-4">
        @yield('content')
    </main>

    <footer class="bg-blue-600 text-white text-center p-4">
        <p>&copy; {{ date('Y') }} Pharmacy. All rights reserved.</p>
    </footer>

</body>
</html>