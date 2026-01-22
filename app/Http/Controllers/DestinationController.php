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
            'location' => 'required'
        ]);

        return Destination::create($request->all());
    }

    public function show($id)
    {
        return Destination::with(['category', 'facilities', 'galleries', 'reviews'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $destination = Destination::findOrFail($id);
        $destination->update($request->all());

        return $destination;
    }

    public function destroy($id)
    {
        Destination::destroy($id);
        return response()->json(['message' => 'Destinasi dihapus']);
    }
}
