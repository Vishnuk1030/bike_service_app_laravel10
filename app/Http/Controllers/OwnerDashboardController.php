<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerDashboardController extends Controller
{
    //
    public function showDashboard()
    {
        $owner = Auth::guard('owner');
        return view('owner.dashboard', compact('owner'));
    }

    public function showpostservice()
    {
        $services = Service::paginate(6);
        return view('owner.post_new_services', compact('services'));
    }
}
