@extends('components.layout')
@section('title', 'My Rides')
@php
    $activePage = 'my-ride';
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
                            <table class="min-w-max w-full table-auto">
                                <thead>
                                <tr class="bg-secondary-400 text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Vehicle</th>
                                    <th class="py-3 px-6 text-center">Date</th>
                                    <th class="py-3 px-6 text-center">Time</th>
                                    <th class="py-3 px-6 text-center">Destination</th>

                                    <th class="py-3 px-6 text-center">Request</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                @if($requests->isEmpty())
                                    <tr>
                                        <td colspan="5" class="py-5 text-center">
                                            <span class="text-gray-400 font-semibold uppercase">No request made</span>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($requests as $request)
                                        <tr class="border-b border-gray-200 hover:bg-primary-100">

                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">

                                                    <span>{{$request->vehicle_name}}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$request->request_date}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$request->route->route_time}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$request->route->route_destination}}</span>
                                            </td>

                                            <td class="py-3 px-6 text-center">
                                                @if($request->request_status == "pending")
                                                    <span
                                                        class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs">Pending</span>
                                                @elseif($request->request_status == "accepted")
                                                    <span
                                                        class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">Accepted</span>
                                                @else
                                                    <span
                                                        class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs">Rejected</span>
                                                @endif
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <a href="{{route('viewRequest', $request->requestID)}}">
                                                        <div
                                                            class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                            <i class='bx bxs-info-circle'></i>
                                                        </div>
                                                    </a>
                                                    <a href="{{route('deleteRequest', $request->requestID)}}"
                                                       class="w-5 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                        <i class='bx bxs-trash'></i>
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
