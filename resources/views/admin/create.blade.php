@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Route</h1>
    <form action="{{ route('admin.routes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="tariff">Tariff</label>
            <input type="number" name="tariff" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="coordinates">Coordinates</label>
            <div id="coordinates">
                <div class="coordinate-item">
                    <input type="text" name="coordinates[0][latitude]" class="form-control mb-2" placeholder="Latitude" required>
                    <input type="text" name="coordinates[0][longitude]" class="form-control mb-2" placeholder="Longitude" required>
                </div>
            </div>
            <button type="button" class="btn btn-secondary" id="add-coordinate">Add Coordinate</button>
        </div>
        <button type="submit" class="btn btn-success">Add Route</button>
    </form>
</div>

<script>
    document.getElementById('add-coordinate').addEventListener('click', function() {
        const coordinatesDiv = document.getElementById('coordinates');
        const coordinateItemCount = coordinatesDiv.getElementsByClassName('coordinate-item').length;
        const newCoordinateItem = document.createElement('div');
        newCoordinateItem.classList.add('coordinate-item');
        newCoordinateItem.innerHTML = `
            <input type="text" name="coordinates[${coordinateItemCount}][latitude]" class="form-control mb-2" placeholder="Latitude" required>
            <input type="text" name="coordinates[${coordinateItemCount}][longitude]" class="form-control mb-2" placeholder="Longitude" required>
        `;
        coordinatesDiv.appendChild(newCoordinateItem);
    });
</script>
@endsection