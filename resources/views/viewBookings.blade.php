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
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-secondary-400 text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Client Name</th>
                                    <th class="py-3 px-6 text-center">Client Phone</th>
                                    <th class="py-3 px-6 text-center">Route</th>
                                    <th class="py-3 px-6 text-center">Date</th>
                                    <th class="py-3 px-6 text-center">Time</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                @foreach($requests as $request)
                                    <tr class="border-b border-gray-200 hover:bg-primary-100">

                                        <td class="py-3 px-6 text-left">
                                            <div class="flex items-center">

                                                <span>{{$request->client->name}}</span>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span>{{$request->client->phone}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span>{{$request->route->route_destination}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span>{{$request->request_date}}</span>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <span>{{$request->route->route_time}}</span>
                                        </td>

                                        @if($request->request_status == 'pending')
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <a
                                                        href="{{route('acceptBooking',$request->requestID )}}"
                                                        class="w-4 mr-5 transform text-green-500 hover:text-purple-500 hover:scale-110">
                                                        <i class='bx bx-check text-2xl'></i>
                                                    </a>

                                                    <a
                                                        href="{{route('declineBooking', $request->requestID)}}"
                                                        class="w-4 mr-2 transform text-red-500 hover:text-purple-500 hover:scale-110">
                                                        <i class='bx bx-x text-2xl'></i>
                                                    </a>
                                                </div>
                                            </td>
                                        @elseif($request->request_status == 'accepted')
                                            <td class="py-3 px-6 text-center">
                                                <span
                                                    class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Accepted</span>
                                            </td>
                                        @else
                                            <td class="py-3 px-6 text-center">
                                                <span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Declined</span>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach

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
