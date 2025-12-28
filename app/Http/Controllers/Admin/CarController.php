<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::latest()->get();
        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        return view('admin.cars.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'duration_hours' => 'required|numeric',
            'recommend_passenger' => 'required|numeric',
            'max_passenger' => 'required|numeric',
        ]);

        $image = $request->file('image')->store('cars', 'public');

        Car::create([
            'name' => $request->name,
            'image' => $image,
            'price' => $request->price,
            'duration_hours' => $request->duration_hours,
            'description' => $request->description,
            'recommend_passenger' => $request->recommend_passenger,
            'max_passenger' => $request->max_passenger,
            'facilities' => $request->facilities,
        ]);

        return redirect()->route('admin.cars.index')->with('success', 'Car added');
    }

    public function edit(Car $car)
    {
        return view('admin.cars.edit', compact('car'));
    }

    public function update(Request $request, Car $car)
    {
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($car->image);
            $car->image = $request->file('image')->store('cars', 'public');
        }

        $car->update($request->except('image'));

        return redirect()->route('admin.cars.index')->with('success', 'Car updated');
    }

    public function destroy(Car $car)
    {
        Storage::disk('public')->delete($car->image);
        $car->delete();

        return back()->with('success', 'Car deleted');
    }
}
