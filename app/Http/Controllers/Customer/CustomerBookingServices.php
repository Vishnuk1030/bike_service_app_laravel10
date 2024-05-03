<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Mail\ServiceBooked;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CustomerBookingServices extends Controller
{
    public function book_service($id)
    {
        //fetching the specific customers by using id
        $data = Service::find($id);
        //updating the value of service_status into 2 (service booked) while clicking the booked button on customer side
        $data->service_status = '2';
        //And updating the customerid who booked the services
        $data->customer_id = Auth::guard('customer')->user()->id;
        //save data
        $data->save();

        //sending email message into owner when service is booked
        Mail::to('owner@gmail.com')->send(new ServiceBooked());

        //return back and display success message
        return redirect()->back()->with('success', 'Service Booked Successfully');
    }
}
