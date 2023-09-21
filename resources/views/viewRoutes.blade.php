@extends('components.layout')
@section('title', 'Car Details')
@php
    $activePage = 'car-details';
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
                            <div
                                class="bg-secondary-400 px-5 py-4 flex flex-row items-center justify-between border-b-2 w-full">
                                <div class=" text-white uppercase text-sm px-2">
                                    <span>My Routes</span>
                                </div>
                                <div>
                                    <a class="bg-secondary-500 text-white px-4 py-2 rounded-lg hover:bg-primary-500"
                                       href="/addRoute">
                                        <i class="bx bx-plus"></i>
                                        <span>Add Route</span>
                                    </a>
                                </div>
                            </div>
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-secondary-400 text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">From</th>
                                    <th class="py-3 px-6 text-center">To</th>
                                    <th class="py-3 px-6 text-center">Time</th>
                                    <th class="py-3 px-6 text-center">Price</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                <tr class="border-b border-gray-200 hover:bg-primary-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>Syokimau</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Thika</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>08:00hrs</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>300</span>
                                    </td>

                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">

                                            <div class="w-6 mr-2 transform hover:scale-125">
                                                <i class='bx bxs-trash text-lg text-red-500'></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200 hover:bg-primary-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>Syokimau</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Thika</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>08:00hrs</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>300</span>
                                    </td>

                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">

                                            <div class="w-6 mr-2 transform hover:scale-125">
                                                <i class='bx bxs-trash text-lg text-red-500'></i>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200 hover:bg-primary-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            <span>Syokimau</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Thika</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>08:00hrs</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>300</span>
                                    </td>

                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">

                                            <div class="w-6 mr-2 transform hover:scale-125">
                                                <i class='bx bxs-trash text-lg text-red-500'></i>
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
