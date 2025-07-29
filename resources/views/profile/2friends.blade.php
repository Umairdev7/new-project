{{-- <!-- Friends List -->
<div class="mt-10">
    <h3 class="text-lg font-bold mb-4">Friends</h3>

    @forelse($friends as $friend)
        <div class="flex items-center gap-4 mb-3">
            <img src="{{ $friend->avatar }}" alt="{{ $friend->name }}"
                 class="w-10 h-10 rounded-full object-cover">
            <div>
                <p class="font-medium text-gray-900">{{ $friend->name }}</p>
                <a href="{{ route('profile.show', $friend->id) }}"
                   class="text-blue-500 hover:underline text-sm">{{ '@' . \Illuminate\Support\Str::slug($friend->name) }}</a>
            </div>
        </div>
    @empty
        <p class="text-gray-600">No friends yet.</p>
    @endforelse
</div> --}}

{{-- 2 --}}

{{-- @extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h2 class="text-xl font-bold mb-4">{{ $user->name }}'s Friends</h2>

    @forelse($friends as $friend)
        <div class="flex items-center gap-4 mb-4">
            <img src="{{ $friend->avatar }}" alt="{{ $friend->name }}"
                 class="w-12 h-12 rounded-full object-cover">
            <div>
                <p class="font-semibold">{{ $friend->name }}</p>
                <a href="{{ route('profile.show', $friend->id) }}"
                   class="text-blue-500 text-sm hover:underline">View Profile</a>
            </div>
        </div>
    @empty
        <p class="text-gray-500">No friends to show.</p>
    @endforelse
</div>
@endsection --}}

{{-- @extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Your Friends</h2>

    @forelse ($friends as $friend)
        <div class="flex items-center justify-between p-4 border rounded mb-3">
            <div class="flex items-center space-x-4">
                <img src="{{ $friend->avatar }}" class="w-12 h-12 rounded-full" alt="">
                <div>
                    <h4 class="font-semibold">{{ $friend->name }}</h4>
                    <p class="text-sm text-gray-500">{{ '@' . \Illuminate\Support\Str::slug($friend->name) }}</p>
                </div>
            </div>
            {{-- <a href="{{ route('show', $friend->id) }}" class="text-blue-600 hover:underline">View Profile</a> --}}
        {{-- </div>
    @empty
        <p class="text-gray-500">You don't have any friends yet.</p>
    @endforelse
</div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="min-h-full">  <!-- Ensures content fills available height -->

{{-- <div class="max-w-3xl mx-auto p-6"> --}}
    <h2 class="text-2xl font-bold mb-4">{{ $user->name }}'s Friends</h2>

    @if ($user->friends->count())
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            @foreach ($user->friends as $friend)
                <div class="flex items-center p-3 border rounded shadow-sm bg-white">
                    <img src="{{ $friend->avatar }}" alt="{{ $friend->name }}" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <a href="{{ route('show', $friend->id) }}" class="text-lg font-semibold text-blue-600 hover:underline">
                            {{ $friend->name }}
                        </a>
                        <p class="text-sm text-gray-500">{{ '@' . \Illuminate\Support\Str::slug($friend->name) }}</p>
                    </div>
                </div>
                {{-- <br> --}}
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No friends to display.</p>
    @endif
</div>
@endsection


