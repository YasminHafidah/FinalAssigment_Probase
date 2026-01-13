<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'ProBase')</title>
    <link rel="icon" href="{{ asset('icon.png') }}">
    @vite('resources/css/app.css')
</head>

<body class="h-full">

    {{ $slot }}

</body>

</html>
