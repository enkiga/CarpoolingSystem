@extends('components.layout')
@section('title', 'Vehicles')
@php
    $activePage = 'vehicles';
@endphp

@section('content')
    @include('AdminPages.adminComponents.adminNavBar')


    @include('components.footer')
@endsection
