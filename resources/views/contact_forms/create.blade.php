@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Us</h1>
    <form action="{{ route('contact_forms.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
