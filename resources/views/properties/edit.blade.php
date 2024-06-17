@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Property</h1>
    <form action="{{ route('properties.update', $property->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $property->address }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ $property->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $property->price }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Property</button>
    </form>
</div>
@endsection
