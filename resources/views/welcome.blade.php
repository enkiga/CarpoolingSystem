@extends('components.layout')
@section('title', 'Home')
@php
    $activePage = 'home';
@endphp

@section('content')
    @include('components.navigationBar')

    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-10 md:flex-row flex-col items-center">
            <div
                class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Green Energy
                    <br class="hidden lg:inline-block">Carpooling services
                </h1>
                <h3 class="mb-8 leading-relaxed text-lg">
                    Hello There
                    <span class="text-secondary-500 font-semibold">
                        @if (session('user'))
                            {{session('user')->name}}
                        @else
                            👋
                        @endif
                    </span>, Welcome to Green Energy Carpooling Services. We are a carpooling service that:
                </h3>
                <p class="mb-8 leading-relaxed">Offers transport solution that is beneficial to the environment. It
                    eases the burden of too many vehicles on the road, reduce air and noise pollution. Helps reduce fuel
                    expense due to the ideology of cost sharing between passengers.</p>
                <div class="flex justify-center">
                    @auth
                        <a
                            href="/findRide"
                            class="inline-flex text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">
                            Get a Ride
                        </a>
                    @else
                        <a
                            href="/login"
                            class="inline-flex text-white bg-green-500 border-0 py-2 px-6 focus:outline-none hover:bg-green-600 rounded text-lg">
                            Get a Ride
                        </a>
                    @endauth

                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero" src="{{URL("images/carpool-home.png")}}">
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection

