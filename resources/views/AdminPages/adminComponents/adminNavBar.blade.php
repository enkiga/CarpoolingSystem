<header class="md:fixed md:top-0 md:z-30 md:w-full bg-primary-50">
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
                    <a class="hover:text-secondary-500 {{ $activePage === 'dashboard' ? 'font-bold text-secondary-500 border-b-2 border-secondary-500' : '' }}"
                       href="/dashboard">Dashboard</a>
                </li>

                <li>
                    <a class="hover:text-secondary-500 {{ $activePage === 'users' ? 'font-bold text-secondary-500 border-b-2 border-secondary-500' : '' }}"
                       href="/users">Users</a>
                </li>

                <li>
                    <a class="hover:text-secondary-500 {{ $activePage === 'vehicles' ? 'font-bold text-secondary-500 border-b-2 border-secondary-500' : '' }}"
                       href="/vehicles">Vehicle</a>
                </li>

                <li>
                    <a class="hover:text-secondary-500 {{ $activePage === 'routes' ? 'font-bold text-secondary-500 border-b-2 border-secondary-500' : '' }}"
                       href="/routes">Routes</a>
                </li>

                <li>
                    <a class="hover:text-secondary-500 {{ $activePage === 'requests' ? 'font-bold text-secondary-500 border-b-2 border-secondary-500' : '' }}"
                       href="/requests">Request</a>
                </li>

            </ul>
        </div>

        <div class="flex items-center gap-6">

            <a href="{{route('logout')}}"
               class="bg-secondary-500 text-white px-5 py-2 rounded-full hover:bg-primary-300"> Logout</a>

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
