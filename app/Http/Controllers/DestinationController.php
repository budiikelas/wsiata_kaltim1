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
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/destinations'), $filename);
            $data['thumbnail'] = 'uploads/destinations/' . $filename;
        }

        $destination = Destination::create($data);

        // Handle Gallery Images
        if ($request->hasFile('gallery_images')) {
            $galleryFiles = $request->file('gallery_images');
            // Max 3 images
            $galleryFiles = array_slice($galleryFiles, 0, 3);
            
            foreach ($galleryFiles as $file) {
                $filename = time() . '_gallery_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/galleries'), $filename);
                
                \App\Models\Gallery::create([
                    'destination_id' => $destination->id,
                    'image' => 'uploads/galleries/' . $filename
                ]);
            }
        }

        return redirect()->back()->with('success', 'Destinasi dan galeri berhasil ditambahkan!');
    }

    public function show($id)
    {
        $destination = Destination::with(['category', 'facilities', 'galleries', 'reviews'])
            ->findOrFail($id);

        return view('detail', compact('destination'));
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
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'gallery_images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048'
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

        // Handle Gallery Images Update (Append up to 3 total)
        if ($request->hasFile('gallery_images')) {
            $existingCount = $destination->galleries()->count();
            $availableSlots = 3 - $existingCount;

            if ($availableSlots > 0) {
                $galleryFiles = $request->file('gallery_images');
                $galleryFiles = array_slice($galleryFiles, 0, $availableSlots);
                
                foreach ($galleryFiles as $file) {
                    $filename = time() . '_gallery_' . $file->getClientOriginalName();
                    $file->move(public_path('uploads/galleries'), $filename);
                    
                    \App\Models\Gallery::create([
                        'destination_id' => $destination->id,
                        'image' => 'uploads/galleries/' . $filename
                    ]);
                }
            }
        }

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
