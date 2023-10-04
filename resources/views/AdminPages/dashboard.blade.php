@extends('components.layout')
@section('title', 'Dashboard')
@php
    $activePage = 'dashboard';
@endphp

@section('content')
    @include('AdminPages.adminComponents.adminNavBar')
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Green Energy Carpooling
                    System</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Welcome to the Admin Page, where you can easily
                    monitor key metrics across our system. Here, you'll find real-time counts for users, vehicles,
                    routes, and requests, providing valuable insights into the dynamic operation of our platform.</p>
            </div>
            <div class="flex flex-wrap -m-4 text-center">
                <a class="p-4 md:w-1/4 sm:w-1/2 w-full cursor-pointer hover:scale-110"
                   href="/users">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <i class='bx bx-group text-green-500 w-12 h-12 mb-3 inline-block text-5xl'></i>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{$usersCount}}</h2>
                        <p class="leading-relaxed">Users</p>
                    </div>
                </a>
                <a class="p-4 md:w-1/4 sm:w-1/2 w-full cursor-pointer hover:scale-110"
                   href="/vehicles">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <i class='bx bx-car text-green-500 w-12 h-12 mb-3 inline-block text-5xl'></i>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{$vehiclesCount}}</h2>
                        <p class="leading-relaxed">Vehicles</p>
                    </div>
                </a>
                <a class="p-4 md:w-1/4 sm:w-1/2 w-full cursor-pointer hover:scale-110"
                   href="/routes">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <i class='bx bx-trip text-green-500 w-12 h-12 mb-3 inline-block text-5xl'></i>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{$routesCount}}</h2>
                        <p class="leading-relaxed">Routes</p>
                    </div>
                </a>
                <a class="p-4 md:w-1/4 sm:w-1/2 w-full cursor-pointer hover:scale-110"
                   href="/requests">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg">
                        <i class='bx bx-receipt text-green-500 w-12 h-12 mb-3 inline-block text-5xl'></i>
                        <h2 class="title-font font-medium text-3xl text-gray-900">{{$requestsCount}}</h2>
                        <p class="leading-relaxed">Requests</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    @include('components.footer')
@endsection

