@extends('components.layout')
@section('title', 'Routes')
@php
    $activePage = 'routes';
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
                                    <th class="py-3 px-6 text-left">RouteID</th>
                                    <th class="py-3 px-6 text-left">Vehicle Name</th>
                                    <th class="py-3 px-6 text-center">Vehicle Owner</th>
                                    <th class="py-3 px-6 text-center">From</th>
                                    <th class="py-3 px-6 text-center">To</th>
                                    <th class="py-3 px-6 text-center">Departure Time</th>
                                    <th class="py-3 px-6 text-center">Price</th>
                                    <th class="py-3 px-6 text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                @if($routes->isEmpty())
                                    <tr>
                                        <td colspan="5" class="py-5 text-center">
                                            <span
                                                class="text-gray-400 font-semibold uppercase">No Users in the system</span>
                                        </td>
                                    </tr>
                                @else
                                    @foreach($routes as $route)
                                        <tr class="border-b border-gray-200 hover:bg-primary-100">

                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <span>{{$route->routeID}}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-left">
                                                <div class="flex items-center">
                                                    <span>{{$route->vehicleName}}</span>
                                                </div>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$route->userName}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$route->route_from}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$route->route_to}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$route->route_time}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <span>{{$route->route_price}}</span>
                                            </td>
                                            <td class="py-3 px-6 text-center">
                                                <div class="flex item-center justify-center">
                                                    <a href="{{route('deleteRouteAdmin', $route->routeID)}}"
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
                                        {{ $routes->links() }}
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
