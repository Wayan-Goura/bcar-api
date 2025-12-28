<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\Car;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data mobil terbaru (maksimal 8)
        $cars = Car::latest()->take(8)->get();

        // PERBAIKAN: Mengambil data ulasan dari database agar variabel $reviews terdefinisi
        $reviews = Review::latest()->get();

        // Mengirimkan kedua variabel ke view 'web.home'
        return view('web.home', compact('cars', 'reviews'));
    }
}