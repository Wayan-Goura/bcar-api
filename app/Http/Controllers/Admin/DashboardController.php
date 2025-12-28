<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Tour;
use App\Models\BookCar;
use App\Models\BookTour;
use App\Models\Review; // 1. Tambahkan Model Review di sini
use Carbon\Carbon;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        // ===== BASIC COUNT =====
        $totalCars = Car::count();
        $totalTours = Tour::count();

        $totalBookCars  = BookCar::count();
        $totalBookTours = BookTour::count();

        $todayBookings = BookTour::whereDate('created_at', Carbon::today())->count();

        // ===== STATUS COUNT =====
        $pending   = BookTour::where('status','pending')->count();
        $approved  = BookTour::where('status','approved')->count();
        $completed = BookTour::where('status','completed')->count();
        $canceled  = BookTour::where('status','canceled')->count();

        // ===== REVENUE =====
        $monthlyRevenue = BookTour::where('status','completed')
            ->whereMonth('created_at', Carbon::now()->month)
            ->sum('price');

        // ===== BOOKING CHART =====
        $bookingChart = BookTour::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->pluck('total','month');

        // ===== REVENUE CHART =====
        $revenueChart = BookTour::selectRaw('MONTH(created_at) as month, SUM(price) as total')
            ->where('status','completed')
            ->groupBy('month')
            ->pluck('total','month');

        // ===== CALENDAR =====
        $calendarBookings = BookTour::select(
            'tour_name as title',
            'booking_date as start'
        )->get();

        // ===== LATEST BOOKINGS =====
        $latestBookings = BookTour::latest()->limit(5)->get();

        // ===== 2. TAMBAHKAN DATA REVIEWS =====
        // Kita ambil 6 ulasan terbaru untuk ditampilkan di dashboard admin
        $reviews = Review::latest()->limit(6)->get();

        return view('admin.dashboard', compact(
            'totalCars',
            'totalTours',
            'totalBookCars',
            'totalBookTours',
            'todayBookings',
            'pending',
            'approved',
            'completed',
            'canceled',
            'monthlyRevenue',
            'bookingChart',
            'revenueChart',
            'calendarBookings',
            'latestBookings',
            'reviews' // 3. Pastikan 'reviews' masuk ke dalam compact
        ));
    }
}