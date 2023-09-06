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
<header class="bg-primary-50">
    <nav class="flex justify-between items-center w-[92%] mx-auto">
        <div>
            <img src="{{ URL('images/logo.png') }}"
                 alt="Green Energy Carpool Logo"
                 class="w-16">
        </div>

        <div
            class="nav-links md:static absolute bg-primary-50 md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
            <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 ">
                <li>
                    <a class="hover:text-secondary-500" href="#">Home</a>
                </li>

                <li>
                    <a class="hover:text-secondary-500" href="#">About Us</a>
                </li>

                <li>
                    <a class="hover:text-secondary-500" href="#">My Rides</a>
                </li>

                <li>
                    <a class="hover:text-secondary-500" href="#">Car Details</a>
                </li>

                <li>
                    <a class="hover:text-secondary-500" href="#">My account</a>
                </li>

                <li>
                    <a class="hover:text-secondary-500" href="#">Find A Car</a>
                </li>

            </ul>
        </div>

        <div class="flex items-center gap-6">
            <button class="bg-secondary-500 text-white px-5 py-2 rounded-full hover:bg-primary-300"> Sign In</button>
            <box-icon onclick="onToggleMenu(this)" name='menu-alt-right'
                      class="text-3xl cursor-pointer md:hidden"></box-icon>
        </div>

    </nav>
</header>
<script>
    function onToggleMenu(iconElement) {
        if (iconElement.getAttribute('name') === 'menu-alt-right') {
            iconElement.setAttribute('name', 'x');
        } else {
            iconElement.setAttribute('name', 'menu-alt-right');
        }

        // You can also add the logic to toggle the navigation links class here
        const navLinks = document.querySelector('.nav-links');
        navLinks.classList.toggle('top-[10%]');
    }
</script>

</body>
</html>
