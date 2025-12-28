<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Car;
class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();
        return view('web.cars.index', compact('cars'));
    }

    public function show(Car $car)
    {
        return view('web.cars.show', compact('car'));
    }
}
