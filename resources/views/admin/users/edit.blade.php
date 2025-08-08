@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Edit User</h2>

    <form action="{{ route('admin.users.update', $user) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label>Name</label>
            <input name="name" class="form-control" value="{{ old('name', $user->name) }}">
            @error('name')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input name="email" class="form-control" value="{{ old('email', $user->email) }}">
            @error('email')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label>New Password (optional)</label>
            <input name="password" type="password" class="form-control">
            @error('password')<small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group">
            <label>Confirm Password</label>
            <input name="password_confirmation" type="password" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
