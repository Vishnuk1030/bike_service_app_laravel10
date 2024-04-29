<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class CustomerAvailableServices extends Controller
{
    public function Show_services()
    {
        $services = Service::paginate(3);
        return view('customer.available_services', compact('services'));
    }
    public function show_booked_history()
    {
        $booked_services = Service::where('service_status', '=', '2')->get();
        return view('customer.services_booked_history',compact('booked_services'));
    }

    public function show_booked_status()
    {
        $services_statuss = Service::where('service_status', '=', '2')->get();
        return view('customer.services_booked_status',compact('services_statuss'));
    }

}
