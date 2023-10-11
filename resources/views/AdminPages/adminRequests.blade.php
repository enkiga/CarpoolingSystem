@extends('components.layout')
@section('title', 'Requests')
@php
    $activePage = 'requests';
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
                                    <th class="py-3 px-6 text-left">Request ID</th>
                                    <th class="py-3 px-6 text-left">Customer Name</th>
                                    <th class="py-3 px-6 text-left">Vehicle ID</th>
                                    <th class="py-3 px-6 text-center">Date</th>
                                    <th class="py-3 px-6 text-center">Time</th>
                                    <th class="py-3 px-6 text-center">Destination</th>
                                    <th class="py-3 px-6 text-center">Request</th>
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
                                                    <span>{{$request->requestID}}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <span>{{$request->customerName}}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <span>{{$request->vehicleID}}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$request->request_date}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$request->routeTime}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$request->destination}}</span>
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
                                        {{ $requests->links() }}
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
