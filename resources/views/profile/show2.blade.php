{{-- @extends('layouts.app')

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
@endsection --}}

{{-- 2 --}}

{{-- @extends('layouts.app')

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

        <!-- Right: Follow/Following or Friend Request Button -->
        @if (auth()->id() !== $user->id)
            <div class="flex gap-2 items-center">

                <!-- Follow / Unfollow Button -->
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

                <!-- Friend Request Button -->
                @if ($friendRequest)
                    <!-- If the friend request is already sent -->
                    <button disabled class="px-4 py-2 text-sm font-semibold text-white bg-yellow-500 rounded-lg shadow">
                        Request Sent
                    </button>
                @elseif ($incomingRequest)
                    <!-- If the user has sent a friend request -->
                    <div class="flex gap-2">
                        <form action="{{ route('friend-request.accept', $incomingRequest->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg shadow">
                                Accept Request
                            </button>
                        </form>
                        <form action="{{ route('friend-request.decline', $incomingRequest->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg shadow">
                                Decline
                            </button>
                        </form>
                    </div>
                @else
                    <!-- If there is no pending request, show the "Send Friend Request" button -->
                    <form action="{{ route('friend-request.send', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow hover:bg-indigo-700 transition">
                            Send Friend Request
                        </button>
                    </form>
                @endif
            </div>
        @endif
    </div>

    <!-- User Details -->
    <div class="text-gray-700">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>About:</strong> {{ $user->about }}</p>
    </div>
</div>
@endsection --}}

{{-- 3 --}}

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

        <!-- Right: Follow/Unfollow and Friend Status -->
        @if (auth()->id() !== $user->id)
            <div class="flex flex-col sm:flex-row gap-2 items-center">

                {{-- Follow/Unfollow --}}
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

                {{-- Friend Status --}}
                @if ($isFriend)
                    <span class="px-4 py-2 text-sm font-semibold text-white bg-green-700 rounded-lg shadow">
                        Friends
                    </span>
                @elseif ($friendRequest)
                    <button disabled
                        class="px-4 py-2 text-sm font-semibold text-white bg-yellow-500 rounded-lg shadow">
                        Request Sent
                    </button>
                @elseif ($incomingRequest)
                    <div class="flex gap-2">
                        <form action="{{ route('friend-request.accept', $incomingRequest->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 text-sm font-semibold text-white bg-green-600 rounded-lg shadow">
                                Accept Request
                            </button>
                        </form>
                        <form action="{{ route('friend-request.decline', $incomingRequest->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 text-sm font-semibold text-white bg-red-600 rounded-lg shadow">
                                Decline
                            </button>
                        </form>
                    </div>
                @else
                    <form action="{{ route('friend-request.send', $user->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="px-4 py-2 text-sm font-semibold text-white bg-indigo-600 rounded-lg shadow hover:bg-indigo-700 transition">
                            Send Friend Request
                        </button>
                    </form>
                @endif

            </div>
        @endif
    </div>

    <!-- User Details -->
    <div class="text-gray-700 mb-8">
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <p><strong>About:</strong> {{ $user->about }}</p>
    </div>

    <!-- Friends List -->
    {{-- @if ($user->friends->count())
        <div>
            <h3 class="text-xl font-bold mb-4">Friends</h3>
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
                @endforeach
            </div>
        </div>
    @endif --}}

</div>
@endsection





