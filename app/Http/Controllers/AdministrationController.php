<?php

namespace App\Http\Controllers;

use App\Models\Requests;
use App\Models\Routes;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
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
        // get all vehicles paginate them
        $vehicles = Vehicle::paginate(5);

        // from user_id in vehicle get user name from Users and save it as userName
        foreach ($vehicles as $vehicle) {
            $user = User::where('id', $vehicle->user_id)->first();
            $vehicle->userName = $user->name;
        }

        return view('AdminPages.adminVehicles', [
            'vehicles' => $vehicles,
        ]);
    }

    public function deleteVehicle($vehicleID): RedirectResponse
    {
        // check if vehicle has accepted requests if so you can't delete it
        //from request table get route id
        //from route table get vehicle id
        //from vehicle table get vehicle id
        //if vehicle id in vehicle table is equal to vehicle id in route table
        //and vehicle id in route table is equal to vehicle id in request table
        //and request status is accepted
        //then you can't delete the vehicle
        $requests = Requests::where('request_status', 'accepted')
            ->join('routes', 'request.route_id', '=', 'routes.routeID')
            ->join('vehicles', 'routes.vehicle_id', '=', 'vehicles.vehicleID')
            ->where('vehicles.vehicleID', $vehicleID)
            ->get();

        if ($requests->count() > 0) {
            // if vehicle has accepted requests redirect back with error message
            return redirect(route('vehicles'))->with('error', 'Vehicle has accepted requests, you cannot delete it');
        } else {
            // if vehicle has no accepted requests delete it
            Vehicle::where('vehicleID', $vehicleID)->delete();

            // delete all routes that belong to the vehicle
            Routes::where('vehicle_id', $vehicleID)->delete();

            return redirect()->route('vehicles');

        }
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

    public function deleteRoute($routeID): RedirectResponse
    {
        // check if route has accepted requests if so you can't delete it
        $requests = Requests::where('route_id', $routeID)->where('request_status', 'accepted')->get();

        if ($requests->count() > 0) {
            // if route has accepted requests redirect back with error message
            return redirect(route('routes'))->with('error', 'Route has accepted requests, you can\'t delete it');
        } else {
            // if route has no accepted requests delete it
            Routes::where('routeID', $routeID)->delete();
            return redirect()->route('routes');
        }
    }

    public function requests(): View
    {
        // get all requests paginate them
        $requests = Requests::paginate(10);

        // from route id in requests get route time and save it as routeTime
        foreach ($requests as $request) {
            $route = Routes::where('routeID', $request->route_id)->first();
            $request->routeTime = $route->route_time;
        }

        // change route time format to hh:mm AM/PM
        foreach ($requests as $request) {
            $request->routeTime = date('h:i A', strtotime($request->routeTime));
        }

        // from route get route from and route to and save it as destination
        foreach ($requests as $request) {
            $route = Routes::where('routeID', $request->route_id)->first();
            $request->destination = $route->route_from . ' - ' . $route->route_to;
        }

        // from route get vehicle id and save it as vehicleID
        foreach ($requests as $request) {
            $route = Routes::where('routeID', $request->route_id)->first();
            $request->vehicleID = $route->vehicle_id;
        }

        // from user id get username and save it as customerName
        foreach ($requests as $request) {
            $user = User::where('id', $request->user_id)->first();
            $request->customerName = $user->name;
        }

        // change date format to dd/mm/yyyy
        foreach ($requests as $request) {
            $request->request_date = date('d/m/Y', strtotime($request->request_date));
        }
        // return view with requests
        return view('AdminPages.adminRequests', [
            'requests' => $requests,
        ]);
    }
}
