@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <a href="{{ route('admin.routes.create') }}" class="btn btn-primary">Add Route</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
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
@endsection
