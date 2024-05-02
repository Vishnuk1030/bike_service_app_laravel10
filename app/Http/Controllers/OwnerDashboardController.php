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
        $services_booked = Service::where('service_status', '=', '2')->count();

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
        $view_booked_services = Service::with('customer')->whereIn('service_status', [2, 3, 4, 5])->get();
        return view('owner.view_booking_service', compact('view_booked_services'));
    }

    //view details of each booking
    public function view_each_service($id)
    {
        //fetching the details from model and for data privacy encryption method used decrypt() and encrypt()
        $each_services_booked = Service::find(decrypt($id));
        return view('owner.view_each_booking', compact('each_services_booked'));
    }

    //display the booked services status
    public function show_booking_status()
    {
        //fetching the detials from the model with service_status= 2:booked, 3:pending, 4:ready for delivery, 5:completed
        $booked_statuss = Service::with('customer')->whereIn('service_status', [2, 3, 4, 5])->get();
        return view('owner.booking_status', compact('booked_statuss'));
    }

    //status changing into pending while clicking the pending button
    public function pending_status($id)
    {
        $data = Service::find($id);

        // updating the status into 3:pending

        $data->service_status = '3';
        //save the update
        $data->save();

        return redirect()->back()->with('success', 'Status Changed to pending..!');
    }

    //status changing into ready for delivery while clicking the ready for delivery button
    public function ready_for_delivery($id)
    {
        $data = Service::find($id);
        // updating the status into 4:ready for delivery

        $data->service_status = '4';

        //save the update
        $data->save();

        return redirect()->back()->with('success', 'Status Changed to Ready for delivery');
    }

    //status changing into completed services while clicking the completed  button
    public function completed($id)
    {
        $data = Service::find($id);
        // updating the status into 5:completed services

        $data->service_status = '5';
        //save the update
        $data->save();

        return redirect()->back()->with('success', 'Status Changed to Service Completed');
    }
}
