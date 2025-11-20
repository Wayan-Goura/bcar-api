<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $query = Car::with('owner');

        // Search by brand or model
        if ($request->has('search')) {
            $query->where('brand', 'like', "%{$request->search}%")
                  ->orWhere('model', 'like', "%{$request->search}%");
        }

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'brand' => 'required',
            'model' => 'required',
            'year' => 'required|integer',
            'status' => 'in:active,sold,maintenance'
        ]);

        $car = Car::create($data);
        return response()->json($car, 201);
    }

    public function show($id)
    {
        return response()->json(Car::with('owner')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);
        $car->update($request->all());
        return response()->json($car);
    }

    public function destroy($id)
    {
        Car::destroy($id);
        return response()->json(['message' => 'Car deleted']);
    }
}
