<?php

namespace App\Http\Controllers;

use App\Models\Routes;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SystemController extends Controller
{
    //
    public function index(): View
    {
        return view('welcome');
    }

    public function carDetails(): View
    {
        //show current user vehicle
        // get user from session
        $user = session()->get('user');

        // get vehicle from user
        $vehicles = Vehicle::where('user_id', $user->id)->get();

        return view('carDetails', ['vehicles' => $vehicles]);

    }

    public function addVehicle(): View
    {
        return view('addCar');
    }

    public function addVehiclePost(Request $request): RedirectResponse
    {
        $request->validate([
            'vehicle_name' => 'required',
            'vehiclePlate' => 'required',
            'vehicle_capacity' => 'required',
            'vehicle_image' => 'required',
        ]);

        $imageName = '';

        if ($request->hasFile('vehicle_image')) {
            $imageName = $request->getSchemeAndHttpHost() . '/assets/images/' . time() . '.' . $request->vehicle_image->extension();

            $request->vehicle_image->move(public_path('assets/images'), $imageName);
        }

        // generate random vehicle id string
        $vehicleID = 'V' . rand(100000, 999999);

        // get user id from session
        $user = session()->get('user');
        $user_id = $user->id;

        // check if vehicleID exists
        $vehicle = Vehicle::where('vehicleID', $vehicleID)->first();
        if ($vehicle) {
            return redirect()->route('addCar')->with('error', 'Vehicle ID already exists');
        } else {
            // create new vehicle
            Vehicle::create([
                'vehicleID' => $vehicleID,
                'vehicle_name' => $request->vehicle_name,
                'vehiclePlate' => $request->vehiclePlate,
                'vehicle_capacity' => $request->vehicle_capacity,
                'vehicle_image' => $imageName,
                'user_id' => $user_id
            ]);


            // check if there was an error
            $vehicle = Vehicle::where('vehicleID', $vehicleID)->first();
            if (!$vehicle) {
                return redirect()->route('addCar')->with('error', 'Vehicle addition failed');
            } else {
                return redirect()->route('carDetails');
            }
        }

    }

    public function viewCarDetails($vehicleID): View
    {
        // get vehicle from vehicleID
        $vehicle = Vehicle::where('vehicleID', $vehicleID)->first();

        // get route count for selected vehicle
        $routeCount = Routes::where('vehicle_id', $vehicleID)->count();

        return view('myCarInfo', ['vehicle' => $vehicle, 'routeCount' => $routeCount]);
    }

    public function deleteCarDetails($vehicleID): RedirectResponse
    {
        // get vehicle from vehicleID
        $vehicle = Vehicle::where('vehicleID', $vehicleID)->first();

        // check if vehicle has routes
        $routeCount = Routes::where('vehicle_id', $vehicleID)->count();

        if ($routeCount > 0) {
            return redirect()->route('carDetails')->with('error', 'Vehicle has routes');
        } else {
            // delete vehicle
            $vehicle->delete();

            // check if there was an error
            $vehicle = Vehicle::where('vehicleID', $vehicleID)->first();
            if ($vehicle) {
                return redirect()->route('carDetails')->with('error', 'Vehicle deletion failed');
            } else {
                return redirect()->route('carDetails');
            }
        }
    }

    public function viewRoutes($vehicleID): View
    {
        // get vehicle from vehicleID
        $vehicle = Vehicle::where('vehicleID', $vehicleID)->first();

        // get routes from selected vehicle
        $routes = Routes::where('vehicle_id', $vehicleID)->get();

        // change route time format to hh:mm AM/PM
        foreach ($routes as $route) {
            $route->route_time = date('h:i A', strtotime($route->route_time));
        }

        return view('viewRoutes', ['vehicle' => $vehicle, 'routes' => $routes]);
    }

    public function addRoute($vehicleID): View
    {
        // get vehicle from vehicleID
        $vehicle = Vehicle::where('vehicleID', $vehicleID)->first();

        return view('addRoute', ['vehicle' => $vehicle]);
    }

    public
    function addRoutePost(Request $request, $vehicleID): RedirectResponse
    {
        $request->validate([
            'route_from' => 'required',
            'route_to' => 'required',
            'route_time' => 'required',
            'route_price' => 'required',
        ]);


        // get vehicle id from vehicleID
        $vehicle = Vehicle::where('vehicleID', $vehicleID)->first();
        $vehicle_id = $vehicle->vehicleID;

        // Generate a unique route id string
        do {
            $routeID = 'RT' . rand(100000, 999999);
            $existingRoute = Routes::where('routeID', $routeID)->first();
        } while ($existingRoute);

        // Create new route
        Routes::create([
            'routeID' => $routeID,
            'vehicle_id' => $vehicle_id,
            'route_from' => $request->route_from,
            'route_to' => $request->route_to,
            'route_time' => $request->route_time,
            'route_price' => $request->route_price,
        ]);

        // check if there was an error
        $route = Routes::where('routeID', $routeID)->first();
        if (!$route) {
            return redirect()->route('addRoute', ['vehicleID' => $vehicleID])->with('error', 'Route addition failed');
        } else {
            return redirect()->route('viewRoutes', ['vehicleID' => $vehicleID]);
        }
    }

    public function findRide(): View
    {
        //get all routes
        $routes = Routes::all();

        // show the first 5 routes
        $routes = $routes->take(0);

        // change route time format to hh:mm AM/PM
        foreach ($routes as $route) {
            $route->route_time = date('h:i A', strtotime($route->route_time));
        }

        return view('findCar', ['routes' => $routes]);
    }

    public function findRideSearch(Request $request): RedirectResponse|View
    {
        $request->validate([
            'route_from' => 'required',
            'route_to' => 'required',
        ]);

        // get routes from selected vehicle
        $routes = Routes::where('route_from', $request->route_from)
            ->where('route_to', $request->route_to)
            ->get();

        // change route time format to hh:mm AM/PM
        foreach ($routes as $route) {
            $route->route_time = date('h:i A', strtotime($route->route_time));
        }


        return view('findCar', ['routes' => $routes]);
    }

    public function viewRideResult($routeID): View
    {
        // get route from routeID
        $route = Routes::where('routeID', $routeID)->first();

        // get vehicle from route
        $vehicle = Vehicle::where('vehicleID', $route->vehicle_id)->first();

        // change route time format to hh:mm AM/PM
        $route->route_time = date('h:i A', strtotime($route->route_time));

        // merge route from and route get route destination
        $route->route_destination = $route->route_from . ' - ' . $route->route_to;

        // get user_id from vehicle
        $owner = $vehicle->user_id;

        // from user_id get user name
        $owner = User::where('id', $owner)->first();

        // return owner vehicle and route details
        return view('viewRide', ['route' => $route, 'vehicle' => $vehicle, 'owner' => $owner]);
    }
}
