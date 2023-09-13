@extends('components.layout')
@section('title', 'Profile')
@php
    $activePage = 'account';
@endphp

@section('content')
    @include('components.navigationBar')

    @include('components.footer')
@endsection
