<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerDashboardController extends Controller
{
    public function showDashboard()
    {
        $total_services = Service::count();
        $total_services_booked = Service::where('service_status', [2,3,4,5])->where('customer_id', '=', Auth::guard('customer')->user()->id)->get();
        $completed_services = Service::where('service_status', '=', '5')->where('customer_id', '=', Auth::guard('customer')->user()->id)->get();
        return view('customer.dashboard', compact('total_services', 'total_services_booked','completed_services'));
    }

    public function logout()
    {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('customer.login')->with('success', 'customer Logged out Successfully..!');
    }
}
