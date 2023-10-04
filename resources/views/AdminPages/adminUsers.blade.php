@extends('components.layout')
@section('title', 'Users')
@php
    $activePage = 'users';
@endphp

@section('content')
    @include('AdminPages.adminComponents.adminNavBar')


    @include('components.footer')
@endsection
