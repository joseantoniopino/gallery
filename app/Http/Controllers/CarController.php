<?php

namespace App\Http\Controllers;

use App\Models\Car;

class CarController extends Controller
{
    public function __invoke()
    {
        $cars = Car::with('images')->get();
        return view('cars.index', compact('cars'));
    }
}
