<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterOwnerController extends Controller
{

    //displaying signup-form for owner
    public function showSignupForm()
    {
        return view('register_owner');
    }
    public function signup()
    {
        //validating the input details
        $validate = request()->validate([
            "name" => 'required|min:5|max:10',
            "email" => 'required|email',
            "mobile" => "required|min:10",
            "password" => "required|min:6",
            "cnf_password" => "required|same:password|min:6"
        ]);

        //inserting the validated input into the DB
        $owner = Owner::create([
            "name" => $validate["name"],
            "email" => $validate["email"],
            "mobile" => $validate["mobile"],
            "password" => Hash::make($validate["password"]),
            "cnf_password" => Hash::make($validate["cnf_password"]),
        ]);

        //redirect into dashboard after signup
        return "Welcome owner to your dashboard";

        //redirecting into login page after the owner signup succesfully
        // return redirect()->route('login')->with('success', 'Sign up SuccessFully.! Now you can login');
    }
    public function showLoginform()
    {
        return view('login_register');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            "email" => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'Owner logged in Successfully');
        } else {
            return redirect()->route('login')->withErrors(['password' => 'Invalid email or password']);
        }
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Owner logged out successfully.!');
    }
}
