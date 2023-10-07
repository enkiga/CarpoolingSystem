<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\Routes;
use App\Models\User;
use App\Models\Vehicle;
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
        // paginate all users with the role of user
        $users = User::where('role', 'user')->paginate(10);

        // from users full name get the last name and save it as surname
        foreach ($users as $user) {
            $nameParts = explode(' ', $user->name);
            if (isset($nameParts[1])) {
                $user->surname = $nameParts[1];
            } else {
                // Handle the case where there is no last name, e.g., only a single-word name.
                $user->surname = '';
            }
        }

        // get first and second name from users name and save them as otherNames
        foreach ($users as $user) {
            $nameParts = explode(' ', $user->name);
            if (isset($nameParts[2])) {
                $user->otherNames = $nameParts[0] . ' ' . $nameParts[2];
            } else {
                // Handle the case where there is no second name, e.g., only a single-word name.
                $user->otherNames = $nameParts[0];
            }
        }

        return view('AdminPages.adminUsers', [
            'users' => $users,
        ]);
    }

    public function vehicles(): View
    {
        return view('AdminPages.adminVehicles');
    }

    public function routes(): View
    {
        // get all routes paginate them
        $routes = Routes::paginate(10);

        // change route time format to hh:mm AM/PM
        foreach ($routes as $route) {
            $route->route_time = date('h:i A', strtotime($route->route_time));
        }

        // from vehicle id in routes
        // get the vehicle name and save it as vehicleName
        foreach ($routes as $route) {
            $vehicle = Vehicle::where('vehicleID', $route->vehicle_id)->first();
            $route->vehicleName = $vehicle->vehicle_name;
        }
        // from vehicle id in routes get user id and save it as userID
        foreach ($routes as $route) {
            $vehicle = Vehicle::where('vehicleID', $route->vehicle_id)->first();
            $route->userID = $vehicle->user_id;
        }

        //from userID get the user name from table users and save it as userName
        foreach ($routes as $route) {
            $user = User::where('id', $route->userID)->first();
            $route->userName = $user->name;
        }


        return view('AdminPages.adminRoutes', [
            'routes' => $routes,
        ]);
    }

    public function deleteRoute($routeID)
    {
        // delete route with the given route id
        Routes::where('routeID', $routeID)->delete();

        //also delete the requests associated with the route
        Requests::where('route_id', $routeID)->delete();


        return redirect()->route('routes');
    }

    public function requests(): View
    {
        return view('AdminPages.adminRequests');
    }
}
