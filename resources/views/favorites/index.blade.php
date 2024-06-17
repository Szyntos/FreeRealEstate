@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Favorites</h1>
    @if ($favorites->count())
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Address</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($favorites as $property)
                    <tr>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->description }}</td>
                        <td>
                            <form action="{{ route('favorites.destroy', $property->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No favorite properties.</p>
    @endif
</div>
@endsection
