<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookCar;

class BookCarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'car_name' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'passenger' => 'required|integer|min:1',
            'booking_date' => 'required|date',
            'rental_duration' => 'required|integer|min:1',
            'pickup_location' => 'required',
            'pickup_time' => 'required',
        ]);

        BookCar::create($request->all());

        return redirect()->back()->with('success', 'Booking car berhasil dikirim!');
    }
}
