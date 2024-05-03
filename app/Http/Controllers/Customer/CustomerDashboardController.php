<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    //Displaying cutomers dashboard
    public function showDashboard()
    {
        //total services avilable
        $total_services = Service::count();
        //total services booked by specific user
        $total_services_booked = Service::where('service_status', [2, 3, 4, 5])->where('customer_id', '=', Auth::guard('customer')->user()->id)->get();
        //total services completed
        $completed_services = Service::where('service_status', '=', '5')->where('customer_id', '=', Auth::guard('customer')->user()->id)->get();
        //return the variables into views
        return view('customer.dashboard', compact('total_services', 'total_services_booked', 'completed_services'));
    }

    //customer logout
    public function logout()
    {
        //logouting authentication
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        //redirecting into login page after logout
        return redirect()->route('customer.login')->with('success', 'customer Logged out Successfully..!');
    }
}
