@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="flex items-center mb-6">
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-full mr-6">
        <div>
            <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
            <p class="text-gray-500">{{ '@' . \Illuminate\Support\Str::slug($user->name) }}</p>
        </div>
    </div>

    {{-- Optional: User bio, email, or more --}}
    <div class="text-gray-700">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>About:</strong> {{ $user->about }}</p>
    </div>
</div>
@endsection
