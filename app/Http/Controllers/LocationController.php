<?php

namespace App\Http\Controllers;

use App\Models\Location;

class LocationController extends Controller
{
    public function __invoke()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }
}
