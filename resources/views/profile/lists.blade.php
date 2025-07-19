@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">{{ $user->name }}'s Profile</h1>

        <h2 class="text-xl font-semibold mb-3">Posts</h2>

        @forelse ($tweets as $tweet)
            <div class="mb-4 p-4 border rounded-lg shadow">
                {!! $tweet->body !!}
                <span class="text-sm text-gray-500">{{ $tweet->created_at->diffForHumans() }}</span>
            </div>
        @empty
            <p>No posts found.</p>
        @endforelse
    </div>
@endsection
