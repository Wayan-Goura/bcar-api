<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    // GET /api/tours
        public function index(Request $request)
{
    $query = Tour::query();

    // 🔍 SEARCH by name
    if ($request->filled('search')) {
        $query->where('name', 'LIKE', '%' . $request->search . '%');
    }

    // 💰 FILTER min price
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    // 💰 FILTER max price
    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    return response()->json(
        $query->latest()->get()
    );
}

    // POST /api/tours
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'cover_image' => 'nullable|string',
            'price' => 'required|numeric',
            'image_1' => 'nullable|string',
            'desc_1' => 'nullable|string',
            'image_2' => 'nullable|string',
            'desc_2' => 'nullable|string',
            'image_3' => 'nullable|string',
            'desc_3' => 'nullable|string',
            'image_4' => 'nullable|string',
            'desc_4' => 'nullable|string',
        ]);

        $tour = Tour::create($validated);

        return response()->json([
            'message' => 'Tour created successfully',
            'data' => $tour
        ], 201);
    }

    // GET /api/tours/{id}
    public function show($id)
    {
        return response()->json(Tour::findOrFail($id));
    }

    // PUT /api/tours/{id}
    public function update(Request $request, $id)
    {
        $tour = Tour::findOrFail($id);

        $tour->update($request->all());

        return response()->json([
            'message' => 'Tour updated successfully',
            'data' => $tour
        ]);
    }

    // DELETE /api/tours/{id}
    public function destroy($id)
    {
        Tour::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Tour deleted successfully'
        ]);
    }
}
