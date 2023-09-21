@extends('components.layout')
@section('title', 'Car Details')
@php
    $activePage = 'car-details';
@endphp

@section('content')
    @include('components.navigationBar')
    <section class="text-gray-600 body-font pt-20">
        <form class="container mx-auto px-5 py-3  bg-primary-50 rounded-2xl">
            {{--heading--}}
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-xl font-bold title-font px-3 py-3 mb-4 text-gray-900 tracking-widest text-start border-b-2 border-primary-100 ">
                    Route Details:</h1>

                <div class="flex flex-wrap w-full mt-5 justify-between">

                    <div class="flex flex-col mx-3 md:w-1/5 w-full">
                        <label for="LocationFrom"
                               class="text-start px-2 text-base font-bold text-gray-700">From:</label>

                        <input type="text" name="LocationFrom" id="LocationFrom"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black"
                               placeholder="Syokimau">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/5 w-full">
                        <label for="LocationTo" class="text-start px-2 text-base font-bold text-gray-700">To:</label>

                        <input type="text" name="LocationTo" id="LocationTo"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black"
                               placeholder="Thika">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/5 w-full">
                        <label for="departureTime"
                               class="text-start px-2 text-base font-bold text-gray-700">Time:</label>

                        <input type="time" name="departureTime" id="departureTime"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/5 w-full">
                        <label for="price" class="text-start px-2 text-base font-bold text-gray-700">Price:</label>

                        <input type="text" name="price" id="price"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black"
                               placeholder="Ksh 300">
                    </div>

                </div>

                <div class="mt-5 w-auto ">
                    <input type="submit"
                           value="Submit"
                           class="mt-5 bg-secondary-500 hover:bg-secondary-400 text-white py-2 px-10 rounded tracking-widest">
                </div>
            </div>
        </form>
    </section>

    @include('components.footer')
@endsection
