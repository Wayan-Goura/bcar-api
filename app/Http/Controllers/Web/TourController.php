<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tour;

class TourController extends Controller
{
    // /tours
    public function index()
    {
        $tours = Tour::latest()->get();
        return view('web.tours.index', compact('tours'));
    }

    // /tours/{tour}
    public function show(Tour $tour)
    {
        return view('web.tours.show', compact('tour'));
    }
}
