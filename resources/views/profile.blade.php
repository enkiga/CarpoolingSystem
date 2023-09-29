@extends('components.layout')
@section('title', 'Profile')
@php
    $activePage = 'account';
@endphp

@section('content')
    @include('components.navigationBar')
    <section class="pt-16 bg-blueGray-50 pb-6 body-font">
        <div class="w-full lg:w-4/12 px-4 mx-auto">
            <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 rounded-lg mt-16">
                <div class="px-6">

                    <div class="text-center mt-12">
                        <h3 class="text-xl font-semibold leading-normal text-blueGray-700 mb-2">
                            {{--Get current user name--}}
                            {{$user->name}}
                        </h3>
                        <div class="mb-2 text-blueGray-600 mt-10">
                            <i class="bx bxl-gmail mr-2 text-lg text-blueGray-400"></i>
                            {{--Get current user email--}}
                            {{$user->email}}
                        </div>
                        <div class="mb-2 text-blueGray-600">
                            <i class="bx bxs-phone mr-2 text-lg text-blueGray-400"></i>
                            {{--Get current user phone--}}
                            {{$user->phone}}
                        </div>
                    </div>
                    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full px-4 text-center">
                                <div class="flex justify-center py-4 lg:pt-4 pt-8">
                                    <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                    {{$user->acceptedCount}}/{{$user->requestCount}}
                                    </span>
                                        <span class="text-sm text-blueGray-400">Bookings</span>
                                    </div>
                                    <div class="mr-4 p-3 text-center">
                                    <span class="text-xl font-bold block uppercase tracking-wide text-blueGray-600">
                                    {{$user->vehicleCount}}
                                    </span>
                                        <span class="text-sm text-blueGray-400">Vehicles</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @include('components.footer')
@endsection
