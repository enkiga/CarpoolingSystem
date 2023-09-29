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
                class="container flex flex-col md:flex-row md:space-x-5 space-y-3 md:space-y-0 rounded-xl shadow-lg p-3 max-w-xs md:max-w-3xl mx-auto border border-white bg-white">
                <div class="w-full md:w-1/3 bg-white grid place-items-center">
                    <img
                        src="{{$vehicle->vehicle_image}}"
                        alt="{{$vehicle->vehicle_image}}" class="rounded-xl"/>
                </div>
                <div class="w-full md:w-2/3 bg-white flex flex-col space-y-2 p-3">
                    <div class="flex justify-between item-center">
                        <p class="text-gray-400 hidden md:block font-semibold text-sm">Ride ID:
                            <span>{{$route->routeID}}</span>
                        </p>
                        <div class="flex items-center">
                            <i class='bx bx-time text-gray-500'></i>
                            <p class="text-gray-600 font-bold text-sm ml-1">
                                {{$route->route_time}}
                            </p>
                        </div>


                    </div>
                    <h3 class="font-black text-secondary-500 md:text-3xl text-xl"> {{$route->route_destination}}</h3>
                    <p class="md:text-lg text-gray-500 text-base font-semibold">
                        Owner Name: <span class="text-gray-800 font-medium">{{$owner->name}}</span>
                    </p>
                    <p class="md:text-lg text-gray-500 text-base font-semibold">
                        Car Model: <span class="text-gray-800 font-medium">{{$vehicle->vehicle_name}}</span>
                    </p>

                    <p class="text-xl font-black text-secondary-500">
                        {{$route->route_price}}
                    </p>

                    {{--get current user from session--}}
                    @php
                        $user = session()->get('user');
                    @endphp
                    {{--compare current user id to owner id. if they are the same hide link Book--}}
                    @if($user->id !== $owner->id)
                        <div class="bg-primary-50 mt-2 py-2 rounded pe-2">
                            <form class="flex flex-col md:flex-row justify-between items-center">
                                <div class="w-full md:flex md:flex-row px-4">
                                    <label
                                        class="text-center py-2 font-semibold text-base text-gray-500 w-full md:w-1/3"
                                        for="booking_date">Book Date:</label>
                                    <input class="py-2 px-2 block rounded-md w-full md:w-2/3" type="date"
                                           name="booking_date" id="booking_date"/>
                                </div>
                                <div class="mt-2 md:mt-0 text-center">
                                    <button
                                        class="bg-secondary-500 hover:bg-secondary-400 text-white py-2 px-6 rounded">
                                        Book
                                    </button>
                                </div>
                            </form>

                        </div>
                    @else
                        <div>
                                <span class="bg-secondary-500 hover:bg-secondary-400 text-white py-2 px-6 rounded">
                                    Cannot Book Own Ride
                                </span>

                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')

@endsection


