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
        // get all users and paginate them into 10 users per page
        $users = User::paginate(10);

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
        return view('AdminPages.adminRoutes');
    }

    public function requests(): View
    {
        return view('AdminPages.adminRequests');
    }
}
