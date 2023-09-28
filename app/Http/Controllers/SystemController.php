<?php

namespace App\Http\Controllers;

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
                'vehicle_image' => $request->vehicle_image,
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
}
