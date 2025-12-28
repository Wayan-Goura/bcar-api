<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::latest()->get();
        return view('admin.tours.index', compact('tours'));
    }

    public function create()
    {
        return view('admin.tours.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'cover_image' => 'required|image',

            'image_1' => 'nullable|image',
            'desc_1'  => 'nullable|string',

            'image_2' => 'nullable|image',
            'desc_2'  => 'nullable|string',

            'image_3' => 'nullable|image',
            'desc_3'  => 'nullable|string',

            'image_4' => 'nullable|image',
            'desc_4'  => 'nullable|string',
        ]);

        // cover image
        $data['cover_image'] = $request->file('cover_image')
            ->store('tours', 'public');

        // detail images
        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile("image_$i")) {
                $data["image_$i"] = $request->file("image_$i")
                    ->store('tours/details', 'public');
            }
        }

        Tour::create($data);

        return redirect()
            ->route('admin.tours.index')
            ->with('success', 'Tour berhasil ditambahkan');
    }

    public function edit(Tour $tour)
    {
        return view('admin.tours.edit', compact('tour'));
    }

    public function update(Request $request, Tour $tour)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'cover_image' => 'nullable|image',

            'image_1' => 'nullable|image',
            'desc_1'  => 'nullable|string',

            'image_2' => 'nullable|image',
            'desc_2'  => 'nullable|string',

            'image_3' => 'nullable|image',
            'desc_3'  => 'nullable|string',

            'image_4' => 'nullable|image',
            'desc_4'  => 'nullable|string',
        ]);

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($tour->cover_image);
            $data['cover_image'] = $request->file('cover_image')
                ->store('tours', 'public');
        }

        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile("image_$i")) {
                Storage::disk('public')->delete($tour->{"image_$i"});
                $data["image_$i"] = $request->file("image_$i")
                    ->store('tours/details', 'public');
            }
        }

        $tour->update($data);

        return redirect()
            ->route('admin.tours.index')
            ->with('success', 'Tour berhasil diperbarui');
    }

    public function destroy(Tour $tour)
    {
        Storage::disk('public')->delete([
            $tour->cover_image,
            $tour->image_1,
            $tour->image_2,
            $tour->image_3,
            $tour->image_4,
        ]);

        $tour->delete();

        return back()->with('success', 'Tour berhasil dihapus');
    }
}
