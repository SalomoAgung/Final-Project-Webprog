@extends('layouts.app')

@section('title', 'Welcome to AppVigate')

@section('content')
    <div class="jumbotron">
        <h1 class="display-4">Welcome to the AppVigate</h1>
        <p class="lead">This app will allow you to find the most suitable public transportation to your destination</p>
    </div>

    <!-- Advice Section -->
    <div class="card p-4 shadow-sm">
        <h2 class="card-title">How to Find the Suitable Public Transportaion Route</h2>
        <p>1. Go to Route tab</p>
        <p>2. Click one route in the list</p>
        <p>3. You will found the tariff for the trip</p>
    </div>
@endsection