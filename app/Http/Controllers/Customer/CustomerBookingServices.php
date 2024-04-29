<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class CustomerBookingServices extends Controller
{
    public function book_service($id)
    {
        $data = Service::find($id);
        $data->service_status = '2';
        $data->save();

        return redirect()->back()->with('success', 'Service Booked Successfully');
    }
}
