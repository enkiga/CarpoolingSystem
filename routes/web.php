<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SystemController;
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


Route::get('/rides', function () {
    return view('rides');
});

Route::get('/find', function () {
    return view('findCar');
});

Route::get('/addVehicle', function () {
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

Route::get('/myCar', function () {
    return view('myCarInfo');
});

Route::get('/routes', function () {
    return view('viewRoutes');
});

Route::get('/addRoute', function () {
    return view('addRoute');
});

Route::get('/car-details', function () {
    return view('carDetails');
});

Route::get('/profile', function () {
    return view('profile');
});

// Grouping routes with their respective controllers
//Authenticating routes
Route::get('/registration', [AuthController::class, 'registration'])->name('registration');
Route::post('/registration', [AuthController::class, 'registrationPost'])->name('registration.post');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

//System routes
Route::get('/', [SystemController::class, 'index'])->name('welcome');

