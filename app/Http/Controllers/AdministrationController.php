<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\Routes;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdministrationController extends Controller
{
    //
    public function dashboard(): View
    {
        // get count of users
        $users = User::all();
        $usersCount = $users->count();

        // get count of vehicles
        $vehicles = Vehicle::all();
        $vehiclesCount = $vehicles->count();

        // get count of routes
        $routes = Routes::all();
        $routesCount = $routes->count();

        // get count of requests
        $requests = Requests::all();
        $requestsCount = $requests->count();

        return view('AdminPages.dashboard', [
            'usersCount' => $usersCount,
            'vehiclesCount' => $vehiclesCount,
            'routesCount' => $routesCount,
            'requestsCount' => $requestsCount,
        ]);
    }

    public function users(): View
    {
        return view('AdminPages.adminUsers');
    }

    public function vehicles(): View
    {
        return view('AdminPages.adminVehicles');
    }

    public function routes(): View
    {
        return view('AdminPages.adminRoutes');
    }

    public function requests(): View
    {
        return view('AdminPages.adminRequests');
    }
}
