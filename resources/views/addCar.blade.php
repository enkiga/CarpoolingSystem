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
                    Car Details:</h1>

                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                           class="flex flex-col items-center justify-center w-full h-36 border-2 border-primary-500 border-dotted rounded-lg cursor-pointer bg-white  hover:bg-primary-100 hover:text-white">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <i class='bx bx-cloud-upload w-8 h-8 text-3xl mb-4'></i>
                            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span>
                                or drag and drop</p>
                            <p class="text-xs text-gray-500">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                        </div>
                        <input id="dropzone-file" type="image" class="hidden" alt="#"/>
                    </label>
                </div>
                <div class="flex flex-wrap w-full mt-5 justify-between">

                    <div class="flex flex-col mx-3 md:w-1/4 w-full">
                        <label for="name" class="text-start px-2 text-base font-bold text-gray-700">Car Name :</label>

                        <input type="text" name="name" id="name"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black"
                               placeholder="Toyota Hilux">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/4 w-full">
                        <label for="plate" class="text-start px-2 text-base font-bold text-gray-700">Car Plate:</label>

                        <input type="text" name="plate" id="plate"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black"
                               placeholder="KAA 123A">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/4 w-full">
                        <label for="seats" class="text-start px-2 text-base font-bold text-gray-700">Seat
                            Number:</label>

                        <input type="number" name="seats" id="seats"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black">
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
