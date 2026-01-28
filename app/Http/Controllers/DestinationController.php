<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {
        return Destination::with(['category', 'facilities', 'galleries'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/destinations'), $filename);
            $data['thumbnail'] = 'uploads/destinations/' . $filename;
        }

        Destination::create($data);

        return redirect()->back()->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function show($id)
    {
        return Destination::with(['category', 'facilities', 'galleries', 'reviews'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);

        $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'location' => 'required',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            // Delete old photo if exists
            if ($destination->thumbnail && file_exists(public_path($destination->thumbnail))) {
                unlink(public_path($destination->thumbnail));
            }

            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/destinations'), $filename);
            $data['thumbnail'] = 'uploads/destinations/' . $filename;
        }

        $destination->update($data);

        return redirect()->back()->with('success', 'Destinasi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $destination = Destination::findOrFail($id);
        
        // Delete photo if exists
        if ($destination->thumbnail && file_exists(public_path($destination->thumbnail))) {
            unlink(public_path($destination->thumbnail));
        }

        $destination->delete();
        
        return redirect()->back()->with('success', 'Destinasi berhasil dihapus!');
    }
}
