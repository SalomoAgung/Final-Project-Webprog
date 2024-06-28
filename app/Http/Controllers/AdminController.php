<?php

namespace App\Http\Controllers;

use App\Models\Route;
use App\Models\Coordinate; // Ensure this line is added
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('admin.index', compact('routes'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tariff' => 'required|numeric',
            'coordinates' => 'required|array',
            'coordinates.*.latitude' => 'required|numeric',
            'coordinates.*.longitude' => 'required|numeric',
        ]);

        $route = Route::create([
            'name' => $request->name,
            'tariff' => $request->tariff,
        ]);

        foreach ($request->coordinates as $coordinate) {
            Coordinate::create([
                'route_id' => $route->id,
                'latitude' => $coordinate['latitude'],
                'longitude' => $coordinate['longitude'],
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Route added successfully.');
    }

    public function edit($id)
    {
        $route = Route::findOrFail($id);
        return view('admin.edit', compact('route'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'tariff' => 'required|numeric',
            'coordinates' => 'required|array',
            'coordinates.*.latitude' => 'required|numeric',
            'coordinates.*.longitude' => 'required|numeric',
        ]);

        $route = Route::findOrFail($id);
        $route->update([
            'name' => $request->name,
            'tariff' => $request->tariff,
        ]);

        // Delete old coordinates
        $route->coordinates()->delete();

        // Add new coordinates
        foreach ($request->coordinates as $coordinate) {
            Coordinate::create([
                'route_id' => $route->id,
                'latitude' => $coordinate['latitude'],
                'longitude' => $coordinate['longitude'],
            ]);
        }

        return redirect()->route('admin.dashboard')->with('success', 'Route updated successfully');
    }

    public function destroy($id)
    {
        $route = Route::findOrFail($id);
        $route->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Route deleted successfully');
    }
}