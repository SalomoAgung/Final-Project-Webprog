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
            color: #FFFFFF;
        }
        .navbar {
            background-color: #0e1350 !important;
        }
        .container {
            background-color: #0D47A1;
            padding: 20px;
            border-radius: 8px;
        }
        .form-control {
            width: 50%;
            margin: 0 auto;
        }
        .content {
            text-align: center;
        }
        .route-list {
            background-color: #0D47A1;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
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
            </>
            </div>
            <div class="navbar-nav ml-auto">
                @guest
                    <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                @endguest
            </div>
        </div>
    </nav>
    <div class="container mt-5 content">
        <h1>Routes List</h1>
        <div class="route-list">
            <select class="form-control" onchange="window.location.href=this.value;">
                <option value="">Select a Route</option>
                @foreach ($routes as $route)
                    <option value="{{ url('routes', $route->id) }}">{{ $route->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>