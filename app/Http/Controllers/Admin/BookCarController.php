<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookCar;

class BookCarController extends Controller
{
    public function index()
    {
        $books = BookCar::latest()->get();
        return view('admin.book-cars.index', compact('books'));
    }

    public function approve($id)
    {
        BookCar::findOrFail($id)->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'Booking approved');
    }

    public function complete($id)
    {
        BookCar::findOrFail($id)->update([
            'status' => 'completed'
        ]);

        return back()->with('success', 'Booking completed');
    }

    public function cancel($id)
    {
        BookCar::findOrFail($id)->delete();
        return back()->with('success', 'Booking canceled');
    }
}
