<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Auth::user()->favoriteProperties;
        return view('favorites.index', compact('favorites'));
    }

    public function store(Request $request)
    {
        $property = Property::findOrFail($request->property_id);
        $user = Auth::user();

        if (!$user->favoriteProperties->contains($property->id)) {
            $user->favoriteProperties()->attach($property->id);
        }

        return redirect()->route('properties.show', ['property' => $property->id])->with('status', 'Property added to favorites.');
    }

    public function destroy($property_id)
    {
        $property = Property::findOrFail($property_id);
        $user = Auth::user();

        if ($user->favoriteProperties->contains($property->id)) {
            $user->favoriteProperties()->detach($property->id);
        }

        return redirect()->route('favorites.index')->with('status', 'Property removed from favorites.');
    }
}
