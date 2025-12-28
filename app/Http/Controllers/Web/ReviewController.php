<?php

namespace App\Http\Controllers\web; // Sesuaikan dengan folder Anda

use App\Http\Controllers\Controller; // Wajib diimport karena folder berbeda
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'rating' => 'required|integer|min:1|max:5',
            'message' => 'required|string',
        ]);

        Review::create([
            'name' => $request->name,
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'Ulasan Anda berhasil dikirim!');
    }
}