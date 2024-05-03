<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerAvailableServices extends Controller
{

    public function Show_services()
    {
        //avilable services that show on customers side by fetching details from database model
        $services = Service::paginate(6);
        //return the avilable services into view
        return view('customer.available_services', compact('services'));
    }


    public function show_booked_history()
    {
        //Booked services displaying by specific customers who logged in
        $booked_services = Service::whereIn('service_status', [2, 3, 4, 5])->where('customer_id', '=', Auth::guard('customer')->user()->id)->get();
        //return the Booked services into view
        return view('customer.services_booked_history', compact('booked_services'));
    }

    public function show_booked_status()
    {
        //Booked services status displaying by specific customers who logged in
        $services_statuss = Service::whereIn('service_status', [2, 3, 4, 5])->where('customer_id', '=', Auth::guard('customer')->user()->id)->get();
        //return the Booked services status into view
        return view('customer.services_booked_status', compact('services_statuss'));
    }
}
