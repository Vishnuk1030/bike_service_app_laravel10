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
        $data = Service::find($id);
        $data->service_status = '2';
        $data->customer_id = Auth::guard('customer')->user()->id;
        $data->save();

        //sending email message into owner when service is booked
        Mail::to('owner@gmail.com')->send(new ServiceBooked());

        return redirect()->back()->with('success', 'Service Booked Successfully');
    }
}
