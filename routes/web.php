<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/rides', function () {
    return view('rides');
});

Route::get('/find', function () {
    return view('findCar');
});

Route::get('/add', function () {
    return view('addCar');
});

Route::get('/requestInfo', function () {
    return view('viewRequest');
});

Route::get('/rideInfo', function () {
    return view('viewRide');
});

Route::get('/bookingInfo', function () {
    return view('viewBookings');
});

Route::get('/car-details', function () {
    return view('carDetails');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/registration', function () {
    return view('registration');
});
