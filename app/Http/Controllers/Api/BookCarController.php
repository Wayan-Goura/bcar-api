<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookCar;
use App\Models\Car;
use Illuminate\Http\Request;

class BookCarController extends Controller
{
    public function index()
    {
        return response()->json(
            BookCar::with('car')->latest()->get()
        );
    }

    public function store(Request $r)
    {
        // VALIDASI
        $r->validate([
            'car_id'          => 'required|exists:cars,id',
            'name'            => 'required',
            'email'           => 'required|email',
            'phone'           => 'required',
            'passenger'       => 'required|integer',
            'booking_date'    => 'required|date',
            'pickup_location' => 'required',
        ]);

        // AMBIL DATA MOBIL
        $car = Car::findOrFail($r->car_id);

        // SIMPAN BOOKING
        $book = BookCar::create([
            'car_id'          => $car->id,
            'car_name'        => $car->name, // ✅ OTOMATIS
            'name'            => $r->name,
            'email'           => $r->email,
            'phone'           => $r->phone,
            'country'         => $r->country,
            'passenger'       => $r->passenger,
            'booking_date'    => $r->booking_date,
            'rental_duration' => $r->rental_duration,
            'pickup_location' => $r->pickup_location,
            'room_no'         => $r->room_no,
            'pickup_time'     => $r->pickup_time,
            'message'         => $r->message,
            'status'          => 'pending',
        ]);

        return response()->json($book, 201);
    }

    public function approve($id)
    {
        BookCar::findOrFail($id)->update([
            'status' => 'approved'
        ]);

        return response()->json(['message' => 'Booking approved']);
    }

    public function complete($id)
    {
        BookCar::findOrFail($id)->update([
            'status' => 'completed'
        ]);

        return response()->json(['message' => 'Booking completed']);
    }

    public function cancel($id)
    {
        BookCar::findOrFail($id)->delete();

        return response()->json(['message' => 'Booking canceled']);
    }
}
