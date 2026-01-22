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
        Gallery::destroy($id);
        return response()->json(['message' => 'Foto dihapus']);
    }
}
