@extends('components.layout')
@section('title', 'Requests')
@php
    $activePage = 'requests';
@endphp

@section('content')
    @include('AdminPages.adminComponents.adminNavBar')


    @include('components.footer')
@endsection
