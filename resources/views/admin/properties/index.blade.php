@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Properties</h1>
    <a href="{{ route('admin.properties.create') }}" class="btn btn-primary mb-3">Add Property</a>
    @if ($properties->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->description }}</td>
                        <td>${{ $property->price }}</td>
                        <td>
                            <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No properties found.</p>
    @endif
</div>
@endsection
