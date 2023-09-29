@extends('components.layout')
@section('title', 'Find a Ride')
@php
    $activePage = 'find-car';
@endphp

@section('content')
    @include('components.navigationBar')

    <section class="text-gray-600 body-font">

        <div class="container mx-auto flex px-5 py-10 flex-col items-center">
            {{--search container--}}
            <form
                id="searchForm"
                class="mt-8 bg-secondary-400 flex flex-col md:flex-row px-5 py-3 rounded shadow-md w-full"
                method="GET" action="{{route('findRideSearch')}}">
                <div class="items-start py-2 px-2 w-full">
                    <div class="my-2">
                        <label class="hidden" for="route_from"></label>
                        <input type="text" name="route_from" id="route_from"
                               class="py-2 px-2 block w-full rounded-md"
                               placeholder="From:">

                    </div>
                </div>
                <div class="items-start py-2 px-2 w-full">
                    <div class="my-2">
                        <label class="hidden" for="route_to"></label>
                        <input type="text" name="route_to" id="route_to"
                               class="py-2 px-2 block w-full rounded-md"
                               placeholder="To:">

                    </div>
                </div>
                <div class="items-start py-2 px-2">
                    <div class="my-2">
                        <button class="bg-secondary-500 hover:bg-primary-500 text-white py-2 px-6 rounded">
                            Search
                        </button>
                    </div>
                </div>
            </form>
            {{--results container--}}
            <div class="w-full mt-8">
                <h1 class="px-2 font-semibold text-xl text-secondary-500 tracking-widest">
                    Results:</h1>

                <div class="overflow-auto rounded-lg shadow bg-primary-50 mt-3"
                     id="tableView">
                    <table class="w-full rounded">
                        <thead class="border-b-2 border-secondary-400">
                        <tr>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left ">From</th>
                            <th class="p-3 text-sm font-semibold tracking-wide text-left ">To</th>
                            <th class="w-40 p-3 text-sm font-semibold tracking-wide text-left ">Departure Time</th>
                            <th class="w-40 p-3 text-sm font-semibold tracking-wide text-left ">Price</th>
                            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left ">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($routes) >0)
                            @foreach($routes as $route)
                                <tr class="border-b-2 border-primary-100 bg-white">
                                    <td class="p-3 text-sm text-gray-700">{{$route->route_from}}</td>
                                    <td class="p-3 text-sm text-gray-700">{{$route->route_to}}</td>
                                    <td class="p-3 text-sm text-gray-700">{{$route->route_time}}</td>

                                    <td class="p-3 text-sm text-gray-700">{{$route->route_price}}</td>
                                    <td class="p-3 text-sm text-gray-700">
                                        <a
                                            href="{{route('viewRide', $route->routeID)}}"
                                            class="bg-secondary-500 hover:bg-secondary-400 text-white py-2 px-6 rounded">
                                            View
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr class="border-b-2 border-primary-100 bg-primary-50">
                                <td colspan="5" class="py-3 px-6 text-center">
                                    <span
                                        class="text-secondary-500 text-lg font-semibold tracking-widest">Search Route</span>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
@endsection
