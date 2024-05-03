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
        return view('owner.register_owner');
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

        //inserting the validated input into the model DataBase
        $owner = Owner::create([
            "name" => $validate["name"],
            "email" => $validate["email"],
            "mobile" => $validate["mobile"],
            //hashing of password
            "password" => Hash::make($validate["password"]),
            "cnf_password" => Hash::make($validate["cnf_password"]),
        ]);


        //redirecting into login page after the owner signup succesfully
        return redirect()->route('login')->with('success', 'Sign up SuccessFully.! Now you can login');
    }

    //displaying login page
    public function showLoginform()
    {
        return view('owner.login_owner');
    }

    //owner login validation and authethication
    public function login(Request $request)
    {
        //validating the owner input
        $validated = $request->validate([
            "email" => 'required|email',
            'password' => 'required|min:6'
        ]);

        //autheticate the owner credentials
        if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password])) {
            //if success redirect into dashboard
            return redirect()->route('dashboard')->with('success', 'Owner logged in Successfully');
        } else {
            //And if fails redirect into back to login page
            return redirect()->route('login')->withErrors(['password' => 'Invalid email or password']);
        }
    }

    //owner logout
    public function logout()
    {
        //authentication logout
        auth()->logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        //redirect into back to login page
        return redirect()->route('login')->with('success', 'Owner logged out successfully.!');
    }
}
