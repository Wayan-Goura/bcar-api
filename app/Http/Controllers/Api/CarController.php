<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * GET /api/cars
     */
    public function index()
    {
        return response()->json(Car::all());
    }

    /**
     * POST /api/cars
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|string',
            'price' => 'required|numeric',
            'duration_hours' => 'required|integer',
            'description' => 'nullable|string',
            'recommend_passenger' => 'required|integer',
            'max_passenger' => 'required|integer',
            'facilities' => 'nullable|string',
        ]);

        $car = Car::create($validated);

        return response()->json([
            'message' => 'Car created successfully',
            'data' => $car
        ], 201);
    }

    /**
     * GET /api/cars/{car}
     */
    public function show(Car $car)
    {
        return response()->json($car);
    }

    /**
     * PUT /api/cars/{car}
     */
    public function update(Request $request, Car $car)
    {
        $car->update($request->all());

        return response()->json([
            'message' => 'Car updated successfully',
            'data' => $car
        ]);
    }

    /**
     * DELETE /api/cars/{car}
     */
    public function destroy(Car $car)
    {
        $car->delete();

        return response()->json([
            'message' => 'Car deleted successfully'
        ]);
    }
}
