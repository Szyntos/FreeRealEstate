@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Properties</div>
                <div class="card-body">
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-primary">Manage Properties</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Contact Forms</div>
                <div class="card-body">
                    <a href="{{ route('admin.contact_forms.index') }}" class="btn btn-primary">View Contact Forms</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Manage Users</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
