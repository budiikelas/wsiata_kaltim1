<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            ['label' => 'Total Users', 'value' => \App\Models\User::count(), 'icon' => 'fas fa-users', 'growth' => '+0%'],
            ['label' => 'Total Destinations', 'value' => Destination::count(), 'icon' => 'fas fa-map-marker-alt', 'growth' => '+0%'],
            ['label' => 'Categories', 'value' => Category::count(), 'icon' => 'fas fa-list', 'growth' => '+0%'],
            ['label' => 'Reviews', 'value' => \App\Models\Review::count(), 'icon' => 'fas fa-star', 'growth' => '+0%'],
        ];

        $consumers = \App\Models\User::latest()->take(5)->get()->map(function($user) {
            return [
                'name' => $user->name,
                'email' => $user->email,
                'destination' => 'Recently Joined',
                'status' => 'Success',
                'date' => $user->created_at->format('d M Y')
            ];
        });

        $popularDestinations = Destination::orderBy('rating', 'desc')->take(3)->get();

        return view('admin', compact('stats', 'consumers', 'popularDestinations'));
    }

    public function destinations()
    {
        $destinations = Destination::with('category')->get();
        $categories = Category::all();
        return view('admin.destinations', compact('destinations', 'categories'));
    }
}
