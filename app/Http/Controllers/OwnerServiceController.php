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

        //inserting datas into model DataBase
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
        //deleteing the specific services by using id
        $id->delete();
        //redirecting back with success message
        return redirect()->route('post.service')->with('success', 'Service deleted Successfully.!');
    }

    //edit the services
    public function Editservice($id)
    {
        //fetching the specific serivces details selected by Owner using the id
        $service = Service::findOrFail(decrypt($id));
        //return services to view
        return view('owner.edit_service', compact('service'));
    }

    //updating the services
    public function Updateservice(Request $request, $id)
    {
        //validating the updated datas
        $request->validate([
            "service_id" => "required",
            "service_name" => "required",
            "service_charge" => "required",
            "days" => "required",
        ]);

        //updating the validated datas into model database
        Service::findOrFail($id)->update([
            "service_id" => $request->service_id,
            "service_name" => $request->service_name,
            "service_charge" => $request->service_charge,
            "min_days_finish" => $request->days,
        ]);

        //redirecting after update of data
        return redirect()->route('post.service')->with('success', 'Services Updated Successfully..!');
    }
}
