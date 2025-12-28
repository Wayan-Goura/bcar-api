<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BookTour;

class BookTourController extends Controller
{
    public function index()
    {
        $books = BookTour::latest()->get();
        return view('admin.book-tours.index', compact('books'));
    }

    public function approve($id)
    {
        BookTour::findOrFail($id)->update([
            'status' => 'approved'
        ]);

        return back()->with('success', 'Booking approved');
    }

    public function complete($id)
    {
        BookTour::findOrFail($id)->update([
            'status' => 'completed'
        ]);

        return back()->with('success', 'Booking completed');
    }

    public function cancel($id)
    {
        BookTour::findOrFail($id)->delete();
        return back()->with('success', 'Booking canceled');
    }
}
