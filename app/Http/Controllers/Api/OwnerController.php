<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index(Request $request)
    {
        // Search & Filter
        $query = Owner::query();

        if ($request->has('search')) {
            $query->where('name', 'like', "%{$request->search}%")
                  ->orWhere('email', 'like', "%{$request->search}%");
        }

        return response()->json($query->with('cars')->get());
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:owners',
            'phone' => 'required'
        ]);

        $owner = Owner::create($data);
        return response()->json($owner, 201);
    }

    public function show($id)
    {
        return response()->json(Owner::with('cars')->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $owner = Owner::findOrFail($id);
        $owner->update($request->all());
        return response()->json($owner);
    }

    public function destroy($id)
    {
        Owner::destroy($id);
        return response()->json(['message' => 'Owner deleted']);
    }
}

