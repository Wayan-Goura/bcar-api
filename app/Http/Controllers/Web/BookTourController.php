<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BookTour;

class BookTourController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tour_name' => 'required',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'participants' => 'required|integer|min:2',
            'phone' => 'required',
            'booking_date' => 'required|date',
            'pickup_location' => 'required',
            'pickup_time' => 'required',
        ]);

        BookTour::create($request->all());

        return redirect()->back()->with('success', 'Booking tour berhasil dikirim!');
    }
}
