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
        
        return view('landing', compact('categories', 'destinations'));
    }
}
