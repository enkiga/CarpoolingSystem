<?php

namespace App\Http\Controllers;

use App\Models\Requests;
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

        // get routes from selected vehicle then from the routes get the pending status request count
        foreach ($vehicles as $vehicle) {
            $routes = Routes::where('vehicle_id', $vehicle->vehicleID)->get();
            $requestCount = 0;
            foreach ($routes as $route) {
                $requestCount += Requests::where('route_id', $route->routeID)
                    ->where('request_status', 'pending')
                    ->count();
            }
            $vehicle->requestCount = $requestCount;

        }


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

    public function deleteRoute($routeID): RedirectResponse
    {
        // get route from routeID
        $route = Routes::where('routeID', $routeID)->first();

        // get vehicle from route
        $vehicle = Vehicle::where('vehicleID', $route->vehicle_id)->first();

        // check if route has requests
        $requestCount = Requests::where('route_id', $routeID)->count();

        if ($requestCount > 0) {
            return redirect()->route('viewRoutes', ['vehicleID' => $vehicle->vehicleID])->with('error', 'Route has requests');
        } else {
            // delete route
            $route->delete();

            // check if there was an error
            $route = Routes::where('routeID', $routeID)->first();
            if ($route) {
                return redirect()->route('viewRoutes', ['vehicleID' => $vehicle->vehicleID])->with('error', 'Route deletion failed');
            } else {
                return redirect()->route('viewRoutes', ['vehicleID' => $vehicle->vehicleID]);
            }
        }
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

    public function bookRide(Request $request, $routeID): RedirectResponse
    {
        $request->validate([
            'request_date' => 'required',
        ]);

        // get request date from request
        $requestDate = $request->request_date;

        // get user from session
        $user = session()->get('user');


        // Generate a unique request id string
        do {
            $requestID = 'TKTNo' . rand(100000, 999999);
            $existingRequest = Requests::where('requestID', $requestID)->first();
        } while ($existingRequest);

        // prevent double booking date for same route
        $request = Requests::where('user_id', $user->id)
            ->where('route_id', $routeID)
            ->where('request_date', $requestDate)
            ->first();

        if (!$request) {
            // Create new request
            Requests::create([
                'requestID' => $requestID,
                'user_id' => $user->id,
                'route_id' => $routeID,
                'request_status' => 'pending',
                'request_date' => $requestDate,
            ]);
        } else {
            return redirect()->route('viewRide', ['routeID' => $routeID])->with('error', 'You have already booked this ride');
        }

        // check if there was an error
        $request = Requests::where('requestID', $requestID)->first();
        if (!$request) {
            return redirect()->route('viewRide', ['routeID' => $routeID])->with('error', 'Ride booking failed');
        } else {
            return redirect()->route('rides');
        }


    }

    public function viewRides(): View
    {
        // get user from session
        $user = session()->get('user');

        // get requests from user
        $requests = Requests::where('user_id', $user->id)->get();

        //convert request date to dd-mm-yyyy
        foreach ($requests as $request) {
            $request->request_date = date('d-m-Y', strtotime($request->request_date));
        }


        // get vehicle name from vehicle
        foreach ($requests as $request) {
            $vehicle = Vehicle::where('vehicleID', $request->route->vehicle_id)->first();
            $request->vehicle_name = $vehicle->vehicle_name;
        }

        // get and change route time format to hh:mm AM/PM from route
        foreach ($requests as $request) {
            $request->route->route_time = date('h:i A', strtotime($request->route->route_time));
        }


        // merge route from and route get route destination
        foreach ($requests as $request) {
            $request->route->route_destination = $request->route->route_from . ' - ' . $request->route->route_to;
        }


        //return view with request, route and vehicle details
        return view('rides', ['requests' => $requests]);

    }


    public function requestInfo($requestID): View
    {
        // get request from requestID
        $request = Requests::where('requestID', $requestID)->first();

        // get route from request
        $route = Routes::where('routeID', $request->route_id)->first();

        // get vehicle from route
        $vehicle = Vehicle::where('vehicleID', $route->vehicle_id)->first();

        // get vehicle owner from vehicle
        $user = User::where('id', $vehicle->user_id)->first();

        // change request date format to dd-mm-yyyy
        $request->request_date = date('d-m-Y', strtotime($request->request_date));

        // change route time format to hh:mm AM/PM
        $route->route_time = date('h:i A', strtotime($route->route_time));

        // merge route from and route get route destination
        $route->route_destination = $route->route_from . ' - ' . $route->route_to;

        // return owner vehicle and route details
        return view('viewRequest', ['request' => $request, 'route' => $route, 'vehicle' => $vehicle, 'user' => $user]);
    }

    public function deleteRequest($requestID): RedirectResponse
    {
        // get request from requestID
        $request = Requests::where('requestID', $requestID)->first();

        // get route from request
        $route = Routes::where('routeID', $request->route_id)->first();

        // get vehicle from route
        $vehicle = Vehicle::where('vehicleID', $route->vehicle_id)->first();

        // get vehicle owner from vehicle
        $user = User::where('id', $vehicle->user_id)->first();


        // cannot delete request if request status is accepted
        if ($request->request_status == 'accepted') {
            return redirect()->route('rides')->with('error', 'Cannot delete accepted request');
        } else {
            // delete request
            $request->delete();
        }

        // check if there was an error
        $request = Requests::where('requestID', $requestID)->first();
        if ($request) {
            return redirect()->route('rides')->with('error', 'Request deletion failed');
        } else {
            return redirect()->route('rides');
        }
    }

    public function viewProfile(): View
    {
        // get user from session
        $user = session()->get('user');

        // get user from user id
        $user = User::where('id', $user->id)->first();

        // from request get request count of user
        $user->requestCount = Requests::where('user_id', $user->id)->count();

        // from request get request count of user where request status is accepted
        $user->acceptedCount = Requests::where('user_id', $user->id)
            ->where('request_status', 'accepted')
            ->count();

        // from vehicle get vehicle count of user
        $user->vehicleCount = Vehicle::where('user_id', $user->id)->count();

        return view('profile', ['user' => $user]);
    }

    public function bookingInfo($vehicleID): View
    {
        // get requests from vehicle id where vehicle id is in routes
        $requests = Requests::whereHas('route', function ($query) use ($vehicleID) {
            $query->where('vehicle_id', $vehicleID);
        })->get();

        // get client name from request
        foreach ($requests as $request) {
            $request->client = User::where('id', $request->user_id)->first();
        }

        //get client phone number from client
        foreach ($requests as $request) {
            $request->client->phone = $request->client->phone;
        }

        // get client name from client
        foreach ($requests as $request) {
            $request->client->name = $request->client->name;
        }

        // get route from route id where route id is in requests
        foreach ($requests as $request) {
            $request->route = Routes::where('routeID', $request->route_id)->first();
        }

        // merge route from and route get route destination
        foreach ($requests as $request) {
            $request->route->route_destination = $request->route->route_from . ' - ' . $request->route->route_to;
        }

        // change route time format to hh:mm AM/PM
        foreach ($requests as $request) {
            $request->route->route_time = date('h:i A', strtotime($request->route->route_time));
        }

        // change request date format to dd-mm-yyyy
        foreach ($requests as $request) {
            $request->request_date = date('d-m-Y', strtotime($request->request_date));
        }

        // return view with requests, routes and vehicle details
        return view('viewBookings', ['requests' => $requests]);
    }

    public function acceptBooking($requestID): RedirectResponse
    {
        // get request from requestID
        $request = Requests::where('requestID', $requestID)->first();

        //get vehicle id from route
        $route = Routes::where('routeID', $request->route_id)->first();
        $vehicleID = $route->vehicle_id;

        // change request status to accepted
        $request->request_status = 'accepted';

        // save request
        $request->save();

        // check if there was an error
        $request = Requests::where('requestID', $requestID)->first();
        if ($request->request_status != 'accepted') {
            return redirect(route('bookingInfo', ['requestID' => $requestID, 'vehicleID' => $vehicleID]))
                ->
                with('error', 'Booking acceptance failed');
        } else {
            // go to view bookings
            return redirect(route('bookingInfo', ['requestID' => $requestID, 'vehicleID' => $vehicleID]));
        }
    }

    public function declineBooking($requestID): RedirectResponse
    {
        // get request from requestID
        $request = Requests::where('requestID', $requestID)->first();

        //get vehicle id from route
        $route = Routes::where('routeID', $request->route_id)->first();
        $vehicleID = $route->vehicle_id;

        // change request status to declined
        $request->request_status = 'rejected';

        // save request
        $request->save();

        // check if there was an error
        $request = Requests::where('requestID', $requestID)->first();
        if ($request->request_status != 'rejected') {
            return redirect(route('bookingInfo', ['requestID' => $requestID, 'vehicleID' => $vehicleID]))->with('error', 'Booking decline failed');
        } else {
            // go to view bookings
            return redirect(route('bookingInfo', ['requestID' => $requestID, 'vehicleID' => $vehicleID]));
        }
    }
}
