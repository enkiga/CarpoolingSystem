@extends('components.layout')
@section('title', 'Car Details')
@php
    $activePage = 'car-details';
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
                        src="{{$vehicle->vehicle_image}}"
                        alt="{{$vehicle->vehicle_image}}" class="rounded-xl"/>
                </div>
                <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">

                    <h3 class="font-black text-secondary-500 md:text-3xl text-xl">{{$vehicle->vehiclePlate}}</h3>
                    <p class="md:text-lg text-gray-500 text-base font-semibold">
                        Vehicle Name: <span class="text-gray-800 font-medium">{{$vehicle->vehicle_name}}</span>
                    </p>

                    <p class="md:text-lg text-gray-500 text-base font-semibold">
                        Seats: <span class="text-gray-800 font-medium">{{$vehicle->vehicle_capacity}}</span>
                    </p>

                    <p class="md:text-lg text-gray-500 text-base font-semibold">
                        Routes: <span class="text-gray-800 font-medium">{{$routeCount}}</span>
                    </p>


                    <div class="flex justify-between item-center pt-3">

                        <div class="flex items-center">

                        </div>

                        <div>
                            <a
                                href="{{route('viewRoutes', $vehicle->vehicleID)}}"
                                class="bg-secondary-500 hover:bg-secondary-400 text-white py-2 px-6 rounded">
                                View Routes
                            </a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
@endsection
