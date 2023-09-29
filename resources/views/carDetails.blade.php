@extends('components.layout')
@section('title', 'Car Details')
@php
    $activePage = 'car-details';
@endphp

@section('content')
    @include('components.navigationBar')

    <section class="text-gray-600 body-font">
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
                                       href="{{route("addVehicle")}}">
                                        <i class="bx bx-plus"></i>
                                        <span>Add Vehicle</span>
                                    </a>
                                </div>
                            </div>
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-secondary-400 text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Vehicle</th>
                                    <th class="py-3 px-6 text-center">Plate</th>
                                    <th class="py-3 px-6 text-center">Seats</th>
                                    <th class="py-3 px-6 text-center">Requests</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                @if ($vehicles->isEmpty())
                                    <tr>
                                        <td colspan="5" class="py-3 px-6 text-center">
                                            <span class="text-secondary-500">No vehicles found</span>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($vehicles as $vehicle)
                                        <tr class="border-b border-gray-200 hover:bg-primary-100">

                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">

                                                    <span>{{$vehicle->vehicle_name}}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$vehicle->vehiclePlate}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$vehicle->vehicle_capacity}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center text-sm text-gray-700">
                                                <div class="relative inline-flex w-fit">
                                                    <div
                                                        class="absolute bottom-auto left-auto right-0 top-0 z-10 inline-block -translate-y-1/2 translate-x-2/4 rotate-0 skew-x-0 skew-y-0 scale-x-100 scale-y-100 whitespace-nowrap rounded-full bg-primary-300 px-2.5 py-1 text-center align-baseline text-xs font-bold leading-none text-secondary-500">
                                                        <span>{{$vehicle->requestCount}}</span>
                                                    </div>
                                                    <a
                                                        href="{{route('bookingInfo', $vehicle->vehicleID)}}    "
                                                        class="inline-block rounded bg-secondary-500 px-6 py-2 text-sm font-medium leading-normal text-white hover:bg-secondary-400 ">
                                                        View
                                                    </a>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <a href="{{route('myCarInfo', $vehicle->vehicleID)}}">
                                                        <div class="w-6 mr-2 transform hover:scale-125">
                                                            <i class='bx bxs-info-circle text-lg text-orange-500'></i>
                                                        </div>
                                                    </a>

                                                    <a href="{{route('deleteCar', $vehicle->vehicleID)}}">
                                                        <div class="w-6 mr-2 transform hover:scale-125">
                                                            <i class='bx bxs-trash text-lg text-red-500'></i>
                                                        </div>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif

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
