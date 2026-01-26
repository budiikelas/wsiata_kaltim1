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
            ['label' => 'Total Users', 'value' => '1,284', 'icon' => 'fas fa-users', 'growth' => '+12%'],
            ['label' => 'Total Bookings', 'value' => '856', 'icon' => 'fas fa-ticket-alt', 'growth' => '+5%'],
            ['label' => 'Revenue', 'value' => '$12,450', 'icon' => 'fas fa-wallet', 'growth' => '+18%'],
            ['label' => 'Active Trips', 'value' => '42', 'icon' => 'fas fa-plane', 'growth' => '+2%'],
        ];

        $consumers = [
            ['name' => 'Aditya Pratama', 'email' => 'aditya@example.com', 'destination' => 'Derawan', 'status' => 'Success', 'date' => '24 Jan 2026'],
            ['name' => 'Siti Aminah', 'email' => 'siti@example.com', 'destination' => 'Kakaban', 'status' => 'Pending', 'date' => '25 Jan 2026'],
            ['name' => 'Budi Santoso', 'email' => 'budi@example.com', 'destination' => 'Maratua', 'status' => 'Success', 'date' => '23 Jan 2026'],
            ['name' => 'Dewi Lestari', 'email' => 'dewi@example.com', 'destination' => 'Labuan Cermin', 'status' => 'Success', 'date' => '22 Jan 2026'],
        ];

        return view('admin', compact('stats', 'consumers'));
    }

    public function destinations()
    {
        $destinations = Destination::with('category')->get();
        $categories = Category::all();
        return view('admin.destinations', compact('destinations', 'categories'));
    }
}
