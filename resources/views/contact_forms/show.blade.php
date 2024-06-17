@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Form Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $contactForm->user->name }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Message</h5>
            <p class="card-text">{{ $contactForm->message }}</p>
            <h5 class="card-title">Submitted At</h5>
            <p class="card-text">{{ $contactForm->created_at }}</p>
            <a href="{{ route('contact_forms.index') }}" class="btn btn-secondary">Back to Contact Forms</a>
        </div>
    </div>
</div>
@endsection
