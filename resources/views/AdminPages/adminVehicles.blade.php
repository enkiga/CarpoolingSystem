@extends('components.layout')
@section('title', 'Vehicles')
@php
    $activePage = 'vehicles';
@endphp

@section('content')
    @include('AdminPages.adminComponents.adminNavBar')

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
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-secondary-400 text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Image</th>
                                    <th class="py-3 px-6 text-left">Vehicle ID</th>
                                    <th class="py-3 px-6 text-center">Name</th>
                                    <th class="py-3 px-6 text-center">Owner</th>
                                    <th class="py-3 px-6 text-center">Plate</th>
                                    <th class="py-3 px-6 text-center">Seats</th>
                                    <th class="py-3 px-6 text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                @if($vehicles->isEmpty())
                                    <tr>
                                        <td colspan="5" class="py-5 text-center">
                                            <span
                                                class="text-gray-400 font-semibold uppercase">No Users in the system</span>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($vehicles as $vehicle)
                                        <tr class="border-b border-gray-200 hover:bg-primary-100">

                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <span>
                                                        <div class="mr-2">
                                            <img class="w-full h-16 rounded-lg object-cover"
                                                 src="{{$vehicle->vehicle_image}}"
                                                 alt="{{$vehicle->vehicle_image}}"/>
                                        </div>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <span>{{$vehicle->vehicleID}}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$vehicle->vehicle_name}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$vehicle->userName}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$vehicle->vehiclePlate}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$vehicle->vehicle_capacity}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <a href="{{route('deleteVehicleAdmin', $vehicle->vehicleID)}}"
                                                       class="w-5 mr-2 transform hover:text-red-500 hover:scale-125">
                                                        <i class='bx bxs-trash'></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            {{--pageination--}}
                            <div
                                class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6">
                                <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                                    <div class="space-x-2"> <!-- Add space-x-* class for spacing -->
                                        {{ $vehicles->links() }}
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
