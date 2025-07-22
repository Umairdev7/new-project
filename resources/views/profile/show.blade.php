@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <div class="flex items-center justify-between mb-6">
        <!-- Left: Avatar + Info -->
        <div class="flex items-center">
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-20 h-20 rounded-full mr-6">
            <div>
                <h2 class="text-2xl font-bold">{{ $user->name }}</h2>
                <p class="text-gray-500">{{ '@' . \Illuminate\Support\Str::slug($user->name) }}</p>
            </div>
        </div>

        <!-- Right: Follow/Following Button -->
        @if (auth()->id() !== $user->id)
            @if ($isFollowing)
                <form method="POST" action="{{ route('unfollow', $user->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-gray-600 rounded-lg shadow hover:bg-gray-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M5 13l4 4L19 7" />
                        </svg>
                        Following
                    </button>
                </form>
            @else
                <form method="POST" action="{{ route('follow', $user->id) }}">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center gap-2 px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                             viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M12 4v16m8-8H4" />
                        </svg>
                        Follow
                    </button>
                </form>
            @endif
        @endif
    </div>

    <!-- User Details -->
    <div class="text-gray-700">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>About:</strong> {{ $user->about }}</p>
    </div>
</div>
@endsection
