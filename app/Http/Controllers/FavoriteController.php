<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggle(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Please login first'], 401);
        }

        $request->validate([
            'destination_id' => 'required|exists:destinations,id',
        ]);

        $user = Auth::user();
        $destinationId = $request->destination_id;

        $isFavorited = $user->favorites()->where('destination_id', $destinationId)->exists();

        if ($isFavorited) {
            $user->favorites()->detach($destinationId);
            $status = 'removed';
        } else {
            $user->favorites()->attach($destinationId);
            $status = 'added';
        }

        return response()->json([
            'success' => true,
            'status' => $status,
            'message' => $status === 'added' ? 'Added to favorites' : 'Removed from favorites'
        ]);
    }
}
