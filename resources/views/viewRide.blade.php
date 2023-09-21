@extends('components.layout')
@section('title', 'Find a Ride')
@php
    $activePage = 'find-car';
@endphp

@section('content')
    @include('components.navigationBar')

    <section class="text-gray-600 body-font">
        <!-- component -->
        <div class="flex flex-col justify-center h-screen bg-gray-20">
            <div
                class="relative flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
                <div class="w-full md:w-1/3 bg-white grid place-items-center">
                    <img
                        src="https://images.pexels.com/photos/4381392/pexels-photo-4381392.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                        alt="tailwind logo" class="rounded-xl"/>
                </div>
                <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                    <div class="flex justify-between item-center">
                        <p class="text-gray-500 font-medium hidden md:block">Ride ID: <span>A001</span></p>
                        <div class="flex items-center">
                            <i class='bx bxs-car h-5 w-5 text-yellow-500'></i>
                            <p class="text-gray-600 font-bold text-sm ml-1">
                                4
                                <span class="text-gray-500 font-normal">/5 Seats</span>
                            </p>
                        </div>

                        <div
                            class="bg-primary-100 px-3 py-1 rounded-full text-xs font-medium text-gray-600 hidden md:block">
                            Sedan
                        </div>
                    </div>
                    <h3 class="font-black text-secondary-500 md:text-3xl text-xl">Syokimau - Thika</h3>
                    <p class="md:text-lg text-gray-500 text-base font-semibold">
                        Owner Name: <span class="text-gray-800 font-medium">John Doe</span>
                    </p>
                    <p class="md:text-lg text-gray-500 text-base font-semibold">
                        Car Model: <span class="text-gray-800 font-medium">Nissan Sunny</span>
                    </p>

                    <p class="text-xl font-black text-secondary-500">
                        Ksh 300
                    </p>
                    <div class="flex justify-between item-center">

                        <div class="flex items-center">
                            <i class='bx bx-time text-gray-500'></i>
                            <p class="text-gray-600 font-bold text-sm ml-1">
                                08:00hrs
                            </p>
                        </div>

                        <div>
                            <a
                                href="#"
                                class="bg-secondary-500 hover:bg-secondary-400 text-white py-2 px-6 rounded">
                                Book
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

@endsection


