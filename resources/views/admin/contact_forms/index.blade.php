@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Contact Forms</h1>
    @if ($contactForms->count())
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Message</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contactForms as $contactForm)
                    <tr>
                        <td>{{ $contactForm->id }}</td>
                        <td>{{ $contactForm->user->name }}</td>
                        <td>{{ $contactForm->message }}</td>
                        <td>
                            <form action="{{ route('admin.contact_forms.destroy', $contactForm->id) }}" method="POST" style="display:inline-block;">
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
        <p>No contact forms found.</p>
    @endif
</div>
@endsection
