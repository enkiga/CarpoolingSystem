<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>@yield('title', 'Green Energy Carpool')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo&family=Lato&family=Montserrat:wght@700&display=swap"
          rel="stylesheet">

    <!-- Box Icon CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css'
          rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>


</head>
<body class="font-[Heebo] bg-white h-screen">
@yield('content')
</body>
</html>
