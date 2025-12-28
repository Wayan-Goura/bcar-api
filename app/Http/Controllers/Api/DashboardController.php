<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Tour;
use App\Models\BookCar;
use App\Models\BookTour;

class DashboardController extends Controller
{
    public function index()
    {
        return response()->json([
            'summary' => [
                'total_cars'       => Car::count(),
                'total_tours'      => Tour::count(),
                'booked_cars'      => BookCar::count(),
                'booked_tours'     => BookTour::count(),
                'pending_bookings' => BookCar::where('status','pending')->count()
                                       + BookTour::where('status','pending')->count(),
            ],

            'latest_book_car' => BookCar::with('car')
                ->latest()->take(5)->get(),

            'latest_book_tour' => BookTour::with('tour')
                ->latest()->take(5)->get(),
        ]);
    }
}
