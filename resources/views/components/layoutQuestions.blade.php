<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ProBase')</title>
    <link rel="icon" href="{{ asset('icon.png') }}">
    @vite('resources/css/app.css')
</head>


<body class="bg-[#E8F1F2] min-h-screen flex flex-col">
    <x-navbar></x-navbar>

    <main class="flex-grow">
        @yield('content')
    </main>

    @stack('scripts')
    <x-footer></x-footer>
</body>


</html>
