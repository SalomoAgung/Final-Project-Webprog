@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="jumbotron jumbotron-fluid text-white text-center py-5" style="background-color: #1a202c;">
        <div class="container">
            <h1 class="display-4">Welcome to the AppVigate</h1>
            <p class="lead">This app will allow you to find the most suitable public transportation to your destination</p>
        </div>
    </div>
    <div class="content-section bg-white p-5 rounded">
        <h2>How to Find the Suitable Public Transportation Route</h2>
        <ul>
            <li>Go to Route tab</li>
            <li>Click one route in the list</li>
            <li>You will find the tariff for the trip</li>
        </ul>
    </div>
</div>
@endsection
