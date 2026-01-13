@php
    $navLinks = [
        ['name' => 'Dashboard', 'href' => '/dashboard', 'active' => request()->is('dashboard')],
        ['name' => 'Progress', 'href' => '/project', 'active' => request()->is('project*')],
        ['name' => 'Meet', 'href' => '/meet', 'active' => request()->is('meet')],
    ];

@endphp


<!DOCTYPE html>
<html lang="en" class="h-full bg-[#E8F1F2]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ProBase')</title>
    <link rel="icon" href="{{ asset('icon.png') }}">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-Navbar :links="$navLinks" />
        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>
<footer class="bg-[#0B132B] text-white py-8">
    <div class="container mx-auto px-6 text-center">

        <p class="font-erica text-3xl">ProBase</p>

        <p class="mt-4 text-sm text-gray-300">
            E-Learning untuk Pembelajaran Perancangan Basis Data
        </p>
        <p class="mt-2 text-sm text-gray-400">
            &copy; {{ date('Y') }} ProBase. All rights reserved.
        </p>
    </div>
</footer>

</html>
