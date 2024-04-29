<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerAuthController extends Controller
{
    public function ShowCustomer_signup_page()
    {
        return view('customer.register_customer');
    }

    public function signup()
    {
        $validated = request()->validate([
            "name" => 'required|min:5|max:10',
            "email" => 'required|email',
            "mobile" => "required|min:10",
            "password" => "required|min:6",
            "cnf_password" => "required|same:password|min:6"
        ]);

        $customer = Customer::create([
            "name" => $validated["name"],
            "email" => $validated["email"],
            "mobile" => $validated["mobile"],
            "password" => Hash::make($validated["password"]),
            "cnf_password" => Hash::make($validated["cnf_password"]),
        ]);

        return redirect()->route('customer.login')->with('success', "customers signup successfully.!,Now you can login");
    }

    public function showCustomer_login_page()
    {
        return view('customer.login_customer');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            "email" => 'required|email',
            "password" => 'required|min:6'
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('customer.dashboard')->with('success', 'Customer Logged in Successfully..!');

        } else {

            return redirect()->route('customer.login')->withErrors([
                'password' => 'Invalid credentials'
            ]);
        }
    }
}
