@extends('components.layout')
@section('title', 'Car Details')
@php
    $activePage = 'car-details';
@endphp

@section('content')
    @include('components.navigationBar')
    <section class="text-gray-600 body-font pt-20">
        <div class="error">
            @if($errors->any())
                <script>
                    let errorMessage = ''

                    @foreach($errors->all() as $error)
                        errorMessage += '{{$error}}\n';
                    @endforeach

                    if (errorMessage !== '') {
                        alert(errorMessage);
                    }
                </script>
            @endif

            @if(session()->has('error'))
                <script>
                    alert('{{session('error')}}');
                </script>
            @endif
        </div>
        <form class="container mx-auto px-5 py-3  bg-primary-50 rounded-2xl"
              action="{{route('addRoute.post', $vehicle->vehicleID)}}"
              method="POST" onsubmit="return routeFormValidation()">
            @csrf
            {{--heading--}}
            <div class="flex flex-col text-center w-full mb-20">
                <h1 class="text-xl font-bold title-font px-3 py-3 mb-4 text-gray-900 tracking-widest text-start border-b-2 border-primary-100 ">
                    Route Details:</h1>

                <div class="flex flex-wrap w-full mt-5 justify-between">

                    <div class="flex flex-col mx-3 md:w-1/5 w-full">
                        <label for="route_from"
                               class="text-start px-2 text-base font-bold text-gray-700">From:</label>

                        <input type="text" name="route_from" id="route_from"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black"
                               placeholder="Syokimau">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/5 w-full">
                        <label for="route_to" class="text-start px-2 text-base font-bold text-gray-700">To:</label>

                        <input type="text" name="route_to" id="route_to"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black"
                               placeholder="Thika">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/5 w-full">
                        <label for="route_time"
                               class="text-start px-2 text-base font-bold text-gray-700">Time:</label>

                        <input type="time" name="route_time" id="route_time"
                               class="mt-1 h-8 bg-white ps-3 w-full border-gray-300 rounded-md text-black">
                    </div>

                    <div class="flex flex-col mx-3 md:w-1/5 w-full">
                        <label for="route_price"
                               class="text-start px-2 text-base font-bold text-gray-700">Price:</label>

                        <input type="text" name="route_price" id="route_price"
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
    <script>
        function routeFormValidation() {
            let route_from = document.getElementById('route_from').value;
            let route_to = document.getElementById('route_to').value;
            let route_time = document.getElementById('route_time').value;
            let route_price = document.getElementById('route_price').value;

            if (route_from === '' || route_to === '' || route_time === '' || route_price === '') {
                alert('Please fill all the fields');
                return false;
            }

            // from cannot be the same as to
            if (route_from === route_to) {
                alert('From and To cannot be the same');
                return false;
            }

            // price must start with ksh
            if (!route_price.startsWith('Ksh')) {
                alert('Price must start with Ksh');
                return false;
            }

            return true;
        }
    </script>

    @include('components.footer')
@endsection
