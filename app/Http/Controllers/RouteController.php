<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Route;

class RouteController extends Controller
{
    public function index()
    {
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    public function show($id)
    {
        $route = Route::with('coordinates')->find($id);
        $routeCoordinates = $route->coordinates->map(function ($coordinate) {
            return [$coordinate->latitude, $coordinate->longitude];
        });

        return view('routes.show', [
            'route' => $route,
            'routeCoordinates' => $routeCoordinates
        ]);
    }
}