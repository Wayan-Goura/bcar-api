<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Menampilkan daftar semua paket tour.
     * Ditambahkan fitur Search dan Sorting berdasarkan Harga.
     */
    public function index(Request $request)
    {
        $query = Tour::query();

        // Fitur Pencarian berdasarkan nama
        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Fitur Pengurutan Harga
        if ($request->sort == 'price_low') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_high') {
            $query->orderBy('price', 'desc');
        } else {
            $query->latest(); // Default: terbaru
        }

        $tours = $query->get();

        return view('web.tours.index', compact('tours'));
    }

    /**
     * Menampilkan detail tour spesifik.
     */
    public function show(Tour $tour)
    {
        // Kita juga bisa mengambil tour terkait (related tours) 
        // untuk ditampilkan di bagian bawah halaman detail
        $relatedTours = Tour::where('id', '!=', $tour->id)
                            ->limit(3)
                            ->get();

        return view('web.tours.show', compact('tour', 'relatedTours'));
    }
}