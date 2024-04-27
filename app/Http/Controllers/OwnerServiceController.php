<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\Service;
use Illuminate\Http\Request;

class OwnerServiceController extends Controller
{
    //display the create service form
    public function show_service_form()
    {
        return view('owner.new_services_form');
    }
    public function create_service()
    {
        //validating the user input
        $validated = request()->validate([
            "service_id" => "required",
            "service_name" => "required",
            "service_charge" => "required",
            "days" => "required",
        ]);

        //inserting datas into DB
        Service::create([
            "service_id" => $validated["service_id"],
            "service_name" => $validated["service_name"],
            "service_charge" => $validated["service_charge"],
            "min_days_finish" => $validated["days"],

        ]);
        //redirecting into page and showing success msg
        return redirect()->route('post.service')->with('success', 'New services Created Successfully.!');
    }
    //delete the services
    public function Deleteservice(Service $id)
    {
        $id->delete();
        return redirect()->route('post.service')->with('success', 'Service deleted Successfully.!');
    }
    //edit the services
    public function Editservice($id)
    {
        $service = Service::findOrFail(decrypt($id));
        return view('owner.edit_service', compact('service'));
    }

    public function Updateservice(Request $request, $id)
    {
        $request->validate([
            "service_id" => "required",
            "service_name" => "required",
            "service_charge" => "required",
            "days" => "required",
        ]);
        Service::findOrFail($id)->update([
            "service_id" => $request->service_id,
            "service_name" => $request->service_name,
            "service_charge" => $request->service_charge,
            "min_days_finish" => $request->days,
        ]);
        return redirect()->route('post.service')->with('success', 'Services Updated Successfully..!');
    }
}
