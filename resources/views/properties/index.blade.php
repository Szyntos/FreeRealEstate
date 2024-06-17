@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Properties</h1>
    @if ($properties->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Description</th>
                    @auth
                        <th>Price</th>
                        <th>Actions</th>
                    @endauth
                </tr>
            </thead>
            <tbody>
                @foreach ($properties as $property)
                    <tr>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->description }}</td>
                        @auth
                            <td>${{ $property->price }}</td>
                            <td>
                                <a href="{{ route('properties.show', $property->id) }}" class="btn btn-info">View</a>
                                @if (auth()->user()->is_admin)
                                    <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
                                    <form action="{{ route('admin.properties.destroy', $property->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @else
                                    @if (auth()->user()->favoriteProperties->contains($property->id))
                                        <form action="{{ route('favorites.destroy', $property->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Remove from Favorites</button>
                                        </form>
                                    @else
                                        <form action="{{ route('favorites.store') }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            <input type="hidden" name="property_id" value="{{ $property->id }}">
                                            <button type="submit" class="btn btn-primary">Add to Favorites</button>
                                        </form>
                                    @endif
                                @endif
                            </td>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No properties available.</p>
    @endif
</div>
@endsection
