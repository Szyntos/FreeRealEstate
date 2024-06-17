@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Property Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $property->address }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Description</h5>
            <p class="card-text">{{ $property->description }}</p>
            <h5 class="card-title">Price</h5>
            <p class="card-text">${{ $property->price }}</p>
            @auth
                @if (auth()->user()->favorites->contains('property_id', $property->id))
                    <span class="badge badge-success">Favorite</span>
                @else
                    <form action="{{ route('favorites.store') }}" method="POST" style="display:inline-block;">
                        @csrf
                        <input type="hidden" name="property_id" value="{{ $property->id }}">
                        <button type="submit" class="btn btn-primary">Add to Favorites</button>
                    </form>
                @endif
            @endauth
            <a href="{{ route('properties.index') }}" class="btn btn-secondary">Back to Properties</a>
        </div>
    </div>
</div>
@endsection
