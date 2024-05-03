<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    //Register a new customer
    public function ShowCustomer_signup_page()
    {
        //displaying register form
        return view('customer.register_customer');
    }

    //signup action
    public function signup()
    {
        //validating the user input
        $validated = request()->validate([
            "name" => 'required|min:5|max:10',
            "email" => 'required|email',
            "mobile" => "required|min:10",
            "password" => "required|min:6",
            "cnf_password" => "required|same:password|min:6"
        ]);

        //Inserting validated datas into the database model
        $customer = Customer::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "mobile" => $validated["mobile"],
            //hashing the password for privacy
            "password" => Hash::make($validated["password"]),
            "cnf_password" => Hash::make($validated["cnf_password"]),
        ]);

        //redirecting the user into login page after signup
        return redirect()->route('customer.login')->with('success', "customers signup successfully.!,Now you can login");
    }

    //login page for customer
    public function showCustomer_login_page()
    {
        //display login page
        return view('customer.login_customer');
    }

    //Login page validation and authentication
    public function login(Request $request)
    {
        //validating data
        $validated = $request->validate([
            "email" => 'required|email',
            "password" => 'required|min:6'
        ]);
        //Authenticate the validated credentials
        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            //if success redirect into dashboard
            return redirect()->route('customer.dashboard')->with('success', 'Customer Logged in Successfully..!');
        } else {
            //if fail to login redirect back
            return redirect()->route('customer.login')->withErrors([
                'password' => 'Invalid credentials'
            ]);
        }
    }
}
