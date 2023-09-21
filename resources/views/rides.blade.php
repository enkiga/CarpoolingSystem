@extends('components.layout')
@section('title', 'My Rides')
@php
    $activePage = 'my-ride';
@endphp

@section('content')
    @include('components.navigationBar')

    <section class="text-gray-600 body-font">
        <!-- component -->
        <div class="container mx-auto flex px-5 py-12 flex-col items-center">
            <div class="overflow-x-auto w-full">
                <div
                    class="flex items-center justify-center">
                    <div class="w-full lg:w-5/6">
                        <div class="bg-white shadow-md rounded my-6 overflow-auto">
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-secondary-400 text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Owner</th>
                                    <th class="py-3 px-6 text-center">Date</th>
                                    <th class="py-3 px-6 text-center">Time</th>
                                    <th class="py-3 px-6 text-center">Destination</th>
                                    <th class="py-3 px-6 text-center">Seats</th>
                                    <th class="py-3 px-6 text-center">Request</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                <tr class="border-b border-gray-200 hover:bg-primary-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">

                                            <span>John Doe</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>12/12/24</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>10:00 AM</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Thika - Syokimau</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>3</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                    <span
                                        class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Rejected</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <a href="/requestInfo">
                                                <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <i class='bx bxs-info-circle'></i>
                                                </div>
                                            </a>
                                            <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <i class='bx bxs-trash'></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200 hover:bg-primary-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">

                                            <span>John Doe</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>12/12/24</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>10:00 AM</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Thika - Syokimau</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>3</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                    <span
                                        class="bg-orange-200 text-orange-600 py-1 px-3 rounded-full text-xs">Pending</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <a href="/requestInfo">
                                                <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <i class='bx bxs-info-circle'></i>
                                                </div>
                                            </a>
                                            <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <i class='bx bxs-trash'></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200 hover:bg-primary-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">

                                            <span>John Doe</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>12/12/24</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>10:00 AM</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Thika - Syokimau</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>3</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                    <span
                                        class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Accepted</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <a href="/requestInfo">
                                                <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                    <i class='bx bxs-info-circle'></i>
                                                </div>
                                            </a>
                                            <div class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <i class='bx bxs-trash'></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.footer')
@endsection
