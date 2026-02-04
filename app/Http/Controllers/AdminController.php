<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Category;
use App\Models\User;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            $this->getStat('Total Users', User::class, 'fas fa-users'),
            $this->getStat('Total Destinations', Destination::class, 'fas fa-map-marker-alt'),
            $this->getStat('Categories', Category::class, 'fas fa-list'),
            $this->getStat('Reviews', \App\Models\Review::class, 'fas fa-star'),
        ];

        $consumers = User::latest()->take(5)->get()->map(function($user) {
            return [
                'name' => $user->name,
                'email' => $user->email,
                'destination' => 'Recently Joined',
                'status' => 'Success',
                'date' => $user->created_at->format('d M Y')
            ];
        });

        $popularDestinations = Destination::orderBy('rating', 'desc')->take(3)->get()->map(function($dest, $index) {
            // Mock Data for UI
            $dest->visits = rand(1200, 5000);
            $maxVisits = 6000;
            $dest->percentage = ($dest->visits / $maxVisits) * 100;
            
            // Distinct Colors for Top 3
            $colors = ['#FFD700', '#00FFFF', '#d4f05c']; // Gold, Cyan, Lime
            $dest->bar_color = $colors[$index] ?? '#ffffff';
            
            return $dest;
        });

        return view('admin', compact('stats', 'consumers', 'popularDestinations'));
    }

    public function destinations()
    {
        $destinations = Destination::with('category')->get();
        $categories = Category::all();
        return view('admin.destinations', compact('destinations', 'categories'));
    }

    public function consumers()
    {
        // Get only non-admin users (customers)
        $consumers = User::where('is_admin', false)
            ->orderBy('created_at', 'desc')
            ->get();
        
        return view('admin.consumers', compact('consumers'));
    }

    public function updateConsumer(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $consumer = User::findOrFail($id);
        
        $consumer->name = $request->name;
        $consumer->email = $request->email;
        
        if ($request->filled('password')) {
            $consumer->password = Hash::make($request->password);
        }
        
        $consumer->save();

        return redirect()->route('admin.consumers')->with('success', 'Data konsumen berhasil diperbarui!');
    }

    public function deleteConsumer($id)
    {
        $consumer = User::findOrFail($id);
        
        // Prevent deleting admin users
        if ($consumer->is_admin) {
            return redirect()->route('admin.consumers')->with('error', 'Tidak dapat menghapus akun admin!');
        }
        
        $consumer->delete();

        return redirect()->route('admin.consumers')->with('success', 'Konsumen berhasil dihapus!');
    }

    // ====== FACILITIES MANAGEMENT ======
    
    public function facilities()
    {
        $facilities = Facility::orderBy('created_at', 'desc')->get();
        return view('admin.facilities', compact('facilities'));
    }

    public function storeFacility(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/facilities'), $imageName);
            $imagePath = 'uploads/facilities/' . $imageName;
        }

        Facility::create([
            'name' => $request->name,
            'description' => $request->description ?? '',
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.facilities')->with('success', 'Fasilitas berhasil ditambahkan!');
    }

    public function updateFacility(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $facility = Facility::findOrFail($id);
        $facility->name = $request->name;
        $facility->description = $request->description ?? '';

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($facility->image && file_exists(public_path($facility->image))) {
                @unlink(public_path($facility->image));
            }

            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/facilities'), $imageName);
            $facility->image = 'uploads/facilities/' . $imageName;
        }

        $facility->save();

        return redirect()->route('admin.facilities')->with('success', 'Fasilitas berhasil diperbarui!');
    }

    public function deleteFacility($id)
    {
        $facility = Facility::findOrFail($id);
        
        // Delete image if exists
        if ($facility->image && file_exists(public_path($facility->image))) {
            @unlink(public_path($facility->image));
        }

        $facility->delete();

        return redirect()->route('admin.facilities')->with('success', 'Fasilitas berhasil dihapus!');
    }

    private function getStat($label, $modelClass, $icon)
    {
        $currentMonth = $modelClass::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();
            
        $lastMonth = $modelClass::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->count();

        $total = $modelClass::count();
        
        $growth = 0;
        if ($lastMonth > 0) {
            $growth = (($currentMonth - $lastMonth) / $lastMonth) * 100;
        } elseif ($currentMonth > 0) {
            $growth = 100;
        }

        $growthStr = ($growth >= 0 ? '+' : '') . round($growth, 1) . '%';

        return [
            'label' => $label,
            'value' => $total,
            'icon' => $icon,
            'growth' => $growthStr . ' this month'
        ];
    }
}
