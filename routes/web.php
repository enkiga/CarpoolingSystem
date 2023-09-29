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


Route::get('/addVehicle', function () {
    return view('addCar');
});

Route::get('/requestInfo', function () {
    return view('viewRequest');
});

Route::get('/bookingInfo', function () {
    return view('viewBookings');
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
Route::get('/car-details', [SystemController::class, 'carDetails'])->name('carDetails');
Route::get('/add-vehicle', [SystemController::class, 'addVehicle'])->name('addVehicle');
Route::post('/add-vehicle', [SystemController::class, 'addVehiclePost'])->name('addVehicle.post');

Route::get('/myCar/{vehicleID}', [SystemController::class, 'viewCarDetails'])->name('myCarInfo');
Route::get('/deleteCar/{vehicleID}', [SystemController::class, 'deleteCarDetails'])->name('deleteCar');
Route::get('/viewRoutes/{vehicleID}', [SystemController::class, 'viewRoutes'])->name('viewRoutes');
Route::get('/addRoute/{vehicleID}', [SystemController::class, 'addRoute'])->name('addRoute');
Route::post('/addRoute/{vehicleID}', [SystemController::class, 'addRoutePost'])->name('addRoute.post');
Route::get('/findRide', [SystemController::class, 'findRide'])->name('findRide');
Route::get('/findRideSearch', [SystemController::class, 'findRideSearch'])->name('findRideSearch');
Route::get('/viewRide/{routeID}', [SystemController::class, 'viewRideResult'])->name('viewRide');

