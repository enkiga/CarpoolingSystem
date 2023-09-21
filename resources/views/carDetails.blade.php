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
                                    <span>My Cars</span>
                                </div>
                                <div>
                                    <a class="bg-secondary-500 text-white px-4 py-2 rounded-lg hover:bg-primary-500"
                                       href="#">
                                        <i class="bx bx-plus"></i>
                                        <span>Add Vehicle</span>
                                    </a>
                                </div>
                            </div>
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-secondary-400 text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Vehicle</th>
                                    <th class="py-3 px-6 text-center">Type</th>
                                    <th class="py-3 px-6 text-center">Plate</th>
                                    <th class="py-3 px-6 text-center">Route</th>
                                    <th class="py-3 px-6 text-center">Seats</th>
                                    <th class="py-3 px-6 text-center">Requests</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                <tr class="border-b border-gray-200 hover:bg-primary-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">

                                            <span>Nissan Sunny</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Sedan</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>KCA 123Z</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Thika - Syokimau</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>4</span>
                                    </td>
                                    <td class="py-3 px-6 text-center text-sm text-gray-700">
                                        <div class="relative inline-flex w-fit">
                                            <div
                                                class="absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 whitespace-nowrap rounded-full bg-primary-300 px-2.5 py-1 text-center align-baseline text-xs font-bold leading-none text-secondary-500">
                                                <span>1</span>
                                            </div>
                                            <a
                                                href="/bookingInfo"
                                                class="inline-block rounded bg-secondary-500 px-6 py-2 text-sm font-medium leading-normal text-white hover:bg-secondary-400 ">
                                                View
                                            </a>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200 hover:bg-primary-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">

                                            <span>Nissan Sunny</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Sedan</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>KCA 123Z</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Thika - Syokimau</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>4</span>
                                    </td>
                                    <td class="py-3 px-6 text-center text-sm text-gray-700">
                                        <div class="relative inline-flex w-fit">
                                            <div
                                                class="absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 whitespace-nowrap rounded-full bg-primary-300 px-2.5 py-1 text-center align-baseline text-xs font-bold leading-none text-secondary-500">
                                                <span>1</span>
                                            </div>
                                            <a
                                                href="/bookingInfo"
                                                class="inline-block rounded bg-secondary-500 px-6 py-2 text-sm font-medium leading-normal text-white hover:bg-secondary-400 ">
                                                View
                                            </a>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-b border-gray-200 hover:bg-primary-100">

                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">

                                            <span>Nissan Sunny</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Sedan</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>KCA 123Z</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>Thika - Syokimau</span>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <span>4</span>
                                    </td>
                                    <td class="py-3 px-6 text-center text-sm text-gray-700">
                                        <div class="relative inline-flex w-fit">
                                            <div
                                                class="absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 whitespace-nowrap rounded-full bg-primary-300 px-2.5 py-1 text-center align-baseline text-xs font-bold leading-none text-secondary-500">
                                                <span>1</span>
                                            </div>
                                            <a
                                                href="/bookingInfo"
                                                class="inline-block rounded bg-secondary-500 px-6 py-2 text-sm font-medium leading-normal text-white hover:bg-secondary-400 ">
                                                View
                                            </a>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                                </svg>
                                            </div>
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                     stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                          stroke-width="2"
                                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
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
