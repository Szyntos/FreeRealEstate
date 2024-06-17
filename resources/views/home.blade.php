@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Available Properties</h1>
    <a href="{{ route('favorites.index') }}" class="btn btn-primary mb-3">My Favorites</a>
    @if ($properties->count())
        <table class="table">
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                    <th>Favorite</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->description }}</td>
                        <td>${{ $property->price }}</td>
                        <td>
                            <a href="{{ route('properties.show', $property->id) }}" class="btn btn-info">View</a>
                        </td>
                        <td>
                            @if (auth()->user()->favorites->contains('property_id', $property->id))
                                <span class="badge badge-success">Favorite</span>
                            @else
                                <form action="{{ route('favorites.store') }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <input type="hidden" name="property_id" value="{{ $property->id }}">
                                    <button type="submit" class="btn btn-primary">Add to Favorites</button>
                                </form>
                            @endif
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
