<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Route</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
        }
        body {
            background-color: #081863;
            color: white;
        }
        .bg-white {
            background-color: #ffffff !important;
            color: #000000 !important;
        }
        .navbar {
            background-color: #0e1350 !important;
        }
        .navbar-brand, .nav-link, .nav-item {
            color: white !important;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ url('/') }}">AppVigate</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link active" href="{{ url('/') }}">Home</a>
                <a class="nav-item nav-link" href="{{ url('/routes') }}">Route</a>
                @auth
                    <a class="nav-item nav-link" href="{{ url('/admin') }}">Admin</a>
                @endauth
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

    <!-- Main content -->
    <div class="container mt-5">
        <h2>Edit Route</h2>
        <form method="POST" action="{{ route('admin.routes.update', $route->id) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $route->name }}" required>
            </div>
            <div class="form-group">
                <label for="tariff">Tariff</label>
                <input type="number" class="form-control" id="tariff" name="tariff" value="{{ $route->tariff }}" required>
            </div>
            <div id="coordinates-container">
                @foreach ($route->coordinates as $index => $coordinate)
                <div class="form-group">
                    <label for="latitude_{{ $index }}">Latitude</label>
                    <input type="text" class="form-control" id="latitude_{{ $index }}" name="coordinates[{{ $index }}][latitude]" value="{{ $coordinate->latitude }}" required>
                </div>
                <div class="form-group">
                    <label for="longitude_{{ $index }}">Longitude</label>
                    <input type="text" class="form-control" id="longitude_{{ $index }}" name="coordinates[{{ $index }}][longitude]" value="{{ $coordinate->longitude }}" required>
                </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Update Route</button>
        </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
