<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $destinations = Destination::with(['category'])
            ->orderBy('rating', 'desc')
            ->get();
        $facilities = \App\Models\Facility::all();
        $reviews = \App\Models\Review::with(['user', 'destination'])->latest()->take(10)->get();
        
        return view('landing', compact('categories', 'destinations', 'facilities', 'reviews'));
    }

    public function packages()
    {
        $categories = Category::all();
        $destinations = Destination::with(['category'])->get();
        return view('packages', compact('categories', 'destinations'));
    }

    public function trending()
    {
        $categories = Category::all();
        $destinations = Destination::with(['category'])
            ->orderBy('rating', 'desc')
            ->get();
        return view('trending', compact('categories', 'destinations'));
    }

    public function favorites()
    {
        $categories = Category::all();
        $user = \Illuminate\Support\Facades\Auth::user();
        $destinations = $user->favorites()->with(['category'])->get();
        
        return view('favorites', compact('categories', 'destinations'));
    }

    public function detail(Request $request)
    {
        $id = $request->query('id', 1); // Default to ID 1 or first one
        
        $destination = Destination::with(['category', 'facilities', 'galleries', 'reviews'])->find($id);
        
        if (!$destination) {
            $destination = Destination::first(); 
            $id = $destination->id;
        }

        // Fetch 5 random recommended destinations excluding the current one
        $recommendations = Destination::where('id', '!=', $id)
            ->where('status', 'aktif')
            ->inRandomOrder()
            ->limit(5)
            ->get();

        // Get "next" destination for preview (simply next in ID or loop back)
        $nextDestination = Destination::where('id', '>', $id)->first() ?? Destination::first();

        return view('detail', compact('destination', 'nextDestination', 'recommendations'));
    }

    public function fasilitas()
    {
        $categories = \App\Models\Category::all();
        $facilities = \App\Models\Facility::all();
        return view('fasilitas', compact('categories', 'facilities'));
    }
}
