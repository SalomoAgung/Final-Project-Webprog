<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $route->name }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        .tariff-block {
            background-color: #d3d3d3;
            padding: 10px;
            border-radius: 5px;
            color: #000000;
            font-size: 1.25rem;
        }
        #map {
            height: 500px;
            width: 100%;
        }
        body {
            background-color: #1A237E;
            color: #FFFFFF;
        }
        .container {
            background-color: #0D47A1;
            padding: 20px;
            border-radius: 8px;
        }
        .navbar {
            background-color: #0e1350;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="{{ url('/') }}">AppVigate</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ url('/') }}">Home</a>
                <a class="nav-item nav-link active" href="{{ url('/routes') }}">Route</a>
            </div>
            <div class="navbar-nav ml-auto">
                @auth
                    <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>{{ $route->name }}</h2>
        <div class="tariff-block">
            <p>Tariff: {{ $route->tariff }}</p>
        </div>
        <div id="map"></div>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('DOM fully loaded and parsed');

            // Route coordinates
            var routeCoordinates = @json($routeCoordinates);

            // Log route coordinates for debugging
            console.log('Route Coordinates:', routeCoordinates);

            // Check if routeCoordinates is empty
            if (routeCoordinates.length === 0) {
                console.error('No route coordinates available.');
                return;
            }

            // Initialize the map
            var map = L.map('map').setView([routeCoordinates[0][0], routeCoordinates[0][1]], 13);

            // Add OpenStreetMap tiles
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Create a polyline and add it to the map
            var latlngs = routeCoordinates.map(function(coord) {
                return [coord[0], coord[1]];
            });

            var routePath = L.polyline(latlngs, {color: 'red'}).addTo(map);

            // Fit the map bounds to the route
            map.fitBounds(routePath.getBounds());
        });
    </script>
</body>
</html>