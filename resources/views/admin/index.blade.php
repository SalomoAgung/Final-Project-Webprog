<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AppVigate</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #081863;
            color: white;
        }
        .navbar {
            background-color: #0e1350;
        }
        .container {
            background-color: #0D47A1;
            padding: 20px;
            border-radius: 8px;
        }
        .tariff-block {
            background-color: #f8f9fa;
            padding: 10px;
            border-radius: 5px;
            color: #000000;
        }
        #map {
            height: 500px;
            width: 100%;
        }
        .route-list {
            background-color: #0D47A1;
            color: white;
            padding: 20px;
            border-radius: 8px;
        }
        table {
            color: white;
        }
        th, td {
            color: white;
        }
        .btn {
            color: #fff;
        }
        .btn-primary {
            background-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-warning {
            background-color: #ffc107;
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
    
    <div class="container mt-5">
        <h2>Admin Dashboard</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Tariff</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($routes as $route)
                        <tr>
                            <td>{{ $route->name }}</td>
                            <td>{{ $route->tariff }}</td>
                            <td>
                            <a href="{{ route('admin.routes.edit', $route->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.routes.destroy', $route->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.routes.create') }}" class="btn btn-primary">Add Route</a>
    </div>
    
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>