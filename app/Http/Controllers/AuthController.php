<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthController extends Controller
{
    //
    public function registration(): RedirectResponse|View
    {
        if (Auth::check()) {
            return redirect(route('welcome'));
        }
        return view('registration');
    }

    public function registrationPost(Request $request): RedirectResponse
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'), // Added phone number
            'password' => Hash::make($request->input('password')),
        ];

        // get query builder instance
        $query = User::query();

        // Check if user with email or phone exists
        $existingUser = User::where('email', $data['email'])->orWhere('phone', $data['phone'])->first();

        if ($existingUser) {
            return redirect(route('registration'))->with('error', 'User already exists');
        }

        // create user
        User::create($data);

        return redirect()->route('login');

    }

    public function login(): RedirectResponse|View
    {
        if (Auth::check()) {
            return redirect(route('welcome'));
        }
        return view('login');
    }


    public function loginPost(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user instanceof User) { // Check if $user is an instance of the User model
                Session::put('user', $user);

                if ($user->isAdmin()) {
                    return redirect()->intended(route('dashboard')); // Admin dashboard route
                } else {
                    return redirect()->intended(route('welcome')); // Regular user route
                }
            }
        }

        return redirect(route('login'))->with('error', 'Invalid credentials');
    }


    public function logout(): RedirectResponse
    {
        Auth::logout();

        Session::flush();

        return redirect(route('welcome'));
    }

}
