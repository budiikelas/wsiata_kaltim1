<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'destination_id' => 'required',
            'image' => 'required'
        ]);

        return Gallery::create($request->all());
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        
        // Delete physical file
        if ($gallery->image && file_exists(public_path($gallery->image))) {
            @unlink(public_path($gallery->image));
        }

        $gallery->delete();
        
        return response()->json(['success' => true, 'message' => 'Foto berhasil dihapus']);
    }
}
