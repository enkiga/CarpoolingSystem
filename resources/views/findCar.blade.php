@extends('components.layout')
@section('title', 'Find a Ride')
@php
    $activePage = 'find-car';
@endphp

@section('content')
    @include('components.navigationBar')
    <section class="pt-16">
        {{--search container--}}
        <div
            class="container mt-10 bg-primary-50 flex flex-wrap px-5 py-6 mx-auto rounded shadow-md justify-between">

            <div class="items-start py-2 px-2">
                <div class="mt-3">
                    <label class="hidden" for="destination_from"></label>
                    <input type="text" name="destination_from" id="destination_from"
                           class="py-2 px-2 block w-full rounded-md"
                           placeholder="From">

                </div>
            </div>

            <div class="items-start py-2 px-2">
                <div class="mt-3">
                    <label class="hidden" for="destination_to"></label>
                    <input type="text" name="destination_to" id="destination_to"
                           class="py-2 px-2 block w-full rounded-md"
                           placeholder="To">

                </div>
            </div>

            <div class="items-start py-2 px-2">
                <div class="mt-3">
                    <label class="hidden" for="date"></label>
                    <input type="date" name="date" id="date"
                           class="py-2 px-2 block w-full rounded-md text-gray-400">

                </div>
            </div>

            <div class="py-2 px-2 items-center justify-center">
                <div class="mt-3">
                    <button class="bg-secondary-500 hover:bg-secondary-400 text-white py-2 px-6 rounded">
                        Search
                    </button>
                </div>
            </div>
        </div>

        {{--results container--}}
        <div class="container mt-8 mx-auto">
            <h1>Results</h1>

            <table class="w-full rounded mt-3">
                <thead class="bg-primary-50 border-b-2 border-secondary-400">
                <tr>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">From</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">To</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Departure Time</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Seats Available</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Price</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left ">Actions</th>
                </thead>
                <tbody>
                <tr>
                    <td class="p-3 text-sm text-gray-700">Syokimau</td>
                    <td class="p-3 text-sm text-gray-700">Westlands</td>
                    <td class="p-3 text-sm text-gray-700">0800hrs</td>
                    <td class="p-3 text-sm text-gray-700">5</td>
                    <td class="p-3 text-sm text-gray-700">300</td>
                    <td class="p-3 text-sm text-gray-700">
                        <button class="bg-secondary-500 hover:bg-secondary-400 text-white py-2 px-6 rounded">
                            Book
                        </button>
                    </td>
            </table>
        </div>

    </section>

    @include('components.footer')

@endsection
