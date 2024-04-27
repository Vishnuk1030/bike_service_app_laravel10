<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class OwnerServiceController extends Controller
{
    public function show_service_form()
    {
        return view('owner.new_services_form');
    }
    public function create_service()
    {
        $validated = request()->validate([
            "service_id" => "required",
            "service_name" => "required",
            "service_charge" => "required",
            "days" => "required",
        ]);

        Service::create([
            "service_id" => $validated["service_id"],
            "service_name" => $validated["service_name"],
            "service_charge" => $validated["service_charge"],
            "min_days_finish" => $validated["days"],

        ]);
        return redirect()->route('post.service')->with('success', 'New services Created Successfully.!');
    }
}
