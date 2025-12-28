<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookTour;
use App\Models\Tour;
use Illuminate\Http\Request;

class BookTourController extends Controller
{
    public function index()
    {
        return response()->json(
            BookTour::with('tour')->latest()->get()
        );
    }

    public function store(Request $r)
    {
        $r->validate([
            'tour_id' => 'required|exists:tours,id',
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required',
            'participants' => 'required|integer',
            'booking_date' => 'required|date',
            'pickup_location' => 'required',
            'pickup_time' => 'required',
        ]);

        $tour = Tour::findOrFail($r->tour_id);

        $book = BookTour::create([
            'tour_id'         => $tour->id,      // 🔗 RELASI
            'tour_name'       => $tour->name,    // ✅ FIX
            'price'           => $tour->price,   // ✅ FIX
            'name'            => $r->name,
            'email'           => $r->email,
            'phone'           => $r->phone,
            'participants'    => $r->participants,
            'booking_date'    => $r->booking_date,
            'pickup_location' => $r->pickup_location,
            'room_no'         => $r->room_no,
            'pickup_time'     => $r->pickup_time,
            'message'         => $r->message,
            'status'          => 'pending',
        ]);

        return response()->json([
            'message' => 'Book tour created successfully',
            'data' => $book
        ], 201);
    }

    public function approve($id)
    {
        BookTour::findOrFail($id)->update([
            'status' => 'approved'
        ]);

        return response()->json(['message' => 'Booking approved']);
    }

    public function complete($id)
    {
        BookTour::findOrFail($id)->update([
            'status' => 'completed'
        ]);

        return response()->json(['message' => 'Booking completed']);
    }

    public function cancel($id)
    {
        BookTour::findOrFail($id)->delete();

        return response()->json(['message' => 'Booking canceled']);
    }
}
