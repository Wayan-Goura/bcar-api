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
            'name'        => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price'       => 'required|numeric',
            'image_1'     => 'nullable|image|max:2048',
            'desc_1'      => 'nullable|string',
            'image_2'     => 'nullable|image|max:2048',
            'desc_2'      => 'nullable|string',
            'image_3'     => 'nullable|image|max:2048',
            'desc_3'      => 'nullable|string',
            'image_4'     => 'nullable|image|max:2048',
            'desc_4'      => 'nullable|string',
        ]);

        // Upload Cover Image
        $data['cover_image'] = $request->file('cover_image')->store('tours', 'public');

        // Upload Detail Images menggunakan loop
        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile("image_$i")) {
                $data["image_$i"] = $request->file("image_$i")->store('tours/details', 'public');
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
            'name'        => 'required|string|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'price'       => 'required|numeric',
            'image_1'     => 'nullable|image|max:2048',
            'desc_1'      => 'nullable|string',
            'image_2'     => 'nullable|image|max:2048',
            'desc_2'      => 'nullable|string',
            'image_3'     => 'nullable|image|max:2048',
            'desc_3'      => 'nullable|string',
            'image_4'     => 'nullable|image|max:2048',
            'desc_4'      => 'nullable|string',
        ]);

        // Update Cover Image jika ada file baru
        if ($request->hasFile('cover_image')) {
            if ($tour->cover_image) {
                Storage::disk('public')->delete($tour->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('tours', 'public');
        }

        // Update Detail Images
        for ($i = 1; $i <= 4; $i++) {
            if ($request->hasFile("image_$i")) {
                // Hapus foto lama jika ada
                if ($tour->{"image_$i"}) {
                    Storage::disk('public')->delete($tour->{"image_$i"});
                }
                $data["image_$i"] = $request->file("image_$i")->store('tours/details', 'public');
            }
        }

        $tour->update($data);

        return redirect()
            ->route('admin.tours.index')
            ->with('success', 'Tour berhasil diperbarui');
    }

    public function destroy(Tour $tour)
    {
        // Kumpulkan semua path file yang perlu dihapus
        $filesToDelete = [$tour->cover_image];

        for ($i = 1; $i <= 4; $i++) {
            if ($tour->{"image_$i"}) {
                $filesToDelete[] = $tour->{"image_$i"};
            }
        }

        // Hapus semua file dari storage
        Storage::disk('public')->delete($filesToDelete);

        // Hapus data dari database
        $tour->delete();

        return back()->with('success', 'Tour berhasil dihapus');
    }
}