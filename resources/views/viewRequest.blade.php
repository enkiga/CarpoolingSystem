@extends('components.layout')
@section('title', 'Find a Ride')
@php
    $activePage = 'my-ride';
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
                    <div class="flex justify-between item-center">
                        <p class="text-gray-400 hidden md:block font-semibold text-sm">Ride ID:
                            <span>{{$vehicle->vehicleID}}</span></p>

                        @if($request->request_status == "pending")
                            <div
                                class="bg-orange-200 px-3 py-1 rounded-full text-xs font-medium text-orange-600 hidden md:block">
                                Pending
                            </div>
                        @elseif($request->request_status == "rejected")
                            <div
                                class="bg-red-200 px-3 py-1 rounded-full text-xs font-medium text-red-600 hidden md:block">
                                Rejected
                            </div>
                        @else
                            <div
                                class="bg-green-200 px-3 py-1 rounded-full text-xs font-medium text-green-600 hidden md:block">
                                Accepted
                            </div>
                        @endif
                    </div>
                    <h3 class="font-black text-secondary-500 md:text-3xl text-xl">{{$route->route_destination}}</h3>
                    @if($request->request_status == "accepted")

                        <p class="md:text-lg text-gray-500 text-base font-semibold">
                            Owner Name: <span class="text-gray-800 font-medium">{{$user->name}}</span>
                        </p>
                        <p class="md:text-lg text-gray-500 text-base font-semibold">
                            Owner Contact: <span class="text-gray-800 font-medium">{{$user->phone}}</span>
                        </p>
                    @endif
                    <p class="md:text-lg text-gray-500 text-base font-semibold">
                        Car: <span class="text-gray-800 font-medium">{{$vehicle->vehicle_name}}</span> /
                        <span class="text-gray-800 font-medium">{{$vehicle->vehiclePlate}}</span>
                    </p>

                    <p class="text-xl font-black text-secondary-500">
                        {{$route->route_price}}
                    </p>
                    <div class="flex justify-between item-center">

                        <div class="flex items-center">
                            <i class='bx bx-time text-gray-500'></i>
                            <p class="text-gray-600 font-bold text-sm ml-1">
                                {{$route->route_time}}
                            </p>
                        </div>

                        <div class="flex items-center">
                            <i class='bx bx-calendar text-gray-500'></i>
                            <p class="text-gray-600 font-bold text-sm ml-1">
                                {{$request->request_date}}
                            </p>
                        </div>

                        <div class="flex items-center">
                            <i class='bx bx-receipt text-gray-500'></i>
                            <p class="text-gray-600 font-bold text-sm ml-1">
                                Ticket No: <span class="text-gray-800 font-medium">{{$request->requestID}}</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

@endsection


