<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'destination_id' => 'nullable|exists:destinations,id',
            'name' => 'nullable|string|max:255',
            'destinasi_name' => 'nullable|string|max:255',
        ]);

        Review::create([
            'user_id' => auth()->id(),
            'destination_id' => $request->destination_id,
            'guest_name' => auth()->user()->name,
            'guest_destination' => $request->destinasi_name,
            'rating' => $request->rating,
            'comment' => $request->comment ?? 'Holiday Rating'
        ]);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Rating berhasil disimpan!']);
        }

        return redirect()->back()->with('success', 'Ulasan Anda telah berhasil dikirim!');
    }
}
