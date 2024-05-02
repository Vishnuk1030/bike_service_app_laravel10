<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerDashboardController extends Controller
{
    //show owner dashboard
    public function showDashboard()
    {
        //counting the total number of customers and services from the model
        $customers = Customer::count();
        $services = Service::count();

        //counting the booked services
        $services_booked = Service::where('service_status', '=', 2)->count();

        //passing the variable to blade file using compact()-method
        return view('owner.dashboard', compact('customers', 'services', 'services_booked'));
    }

    //create new services by owner
    public function showpostservice()
    {
        //fetching the newly created services from the model
        $services = Service::paginate(6);
        return view('owner.post_new_services', compact('services'));
    }

    //display customer booked services
    public function show_booked_service()
    {
        //show only booked services by fetching from model
        $view_booked_services = Service::with('customer')->where('service_status', '=', '2')->get();
        return view('owner.view_booking_service', compact('view_booked_services'));
    }

    //view details of each booking
    public function view_each_service($id)
    {
        //fetching the details from model and for data privacy encryption method used decrypt() and encrypt()
        $each_services_booked = Service::find(decrypt($id));
        return view('owner.view_each_booking', compact('each_services_booked'));
    }

    //
    public function show_booking_status()
    {
        $booked_statuss = Service::with('customer')->where('service_status', '=', '2')->get();
        return view('owner.booking_status', compact('booked_statuss'));
    }
}
