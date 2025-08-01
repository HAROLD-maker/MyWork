<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'MyWork')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>
<body class="bg-white text-[#1b1b18] min-h-screen flex flex-col transition-colors duration-300">
    <livewire:header />
    <main class="flex-1 w-full">
        @yield('content')
    </main>
    @livewireScripts
</body>
</html> 