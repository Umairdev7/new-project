{{-- @extends('layouts.app')

@section('content')
    <h2 class="text-xl font-bold mb-4">Incoming Friend Requests</h2>

    @forelse($friendRequests as $request)
        <div class="mb-4 p-4 border rounded flex justify-between items-center">
            <span>{{ $request->sender->name }} sent you a friend request</span>

            <div class="space-x-2">
                <form action="{{ route('friend-request.accept', $request->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded">Accept</button>
                </form>

                <form action="{{ route('friend-request.decline', $request->id) }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Decline</button>
                </form>
            </div>
        </div>
    @empty
        <p>No pending friend requests.</p>
    @endforelse
@endsection --}}

{{-- 2 --}}

{{-- @extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-4 sm:p-6">
        <h2 class="text-xl sm:text-2xl font-bold mb-6">Incoming Friend Requests</h2>

        @forelse($friendRequests as $request)
            <div class="mb-4 p-4 border rounded-lg shadow-sm flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <!-- Sender Info -->
                <div class="flex items-center gap-4">
                    <img src="{{ $request->sender->avatar }}" alt="{{ $request->sender->name }}"
                         class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-gray-900">{{ $request->sender->name }}</p>
                        <p class="text-gray-500 text-sm">{{ '@' . \Illuminate\Support\Str::slug($request->sender->name) }}</p>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-2 mt-2 sm:mt-0">
                    <form action="{{ route('friend-request.accept', $request->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                            Accept
                        </button>
                    </form>

                    <form action="{{ route('friend-request.decline', $request->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                            Decline
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">No pending friend requests.</p>
        @endforelse
    </div>
@endsection --}}

{{-- 3 --}}

@extends('layouts.app')

@section('content')
  <div class="min-h-full">  <!-- Ensures content fills available height -->


    <div class="max-w-3xl mx-auto p-4 sm:p-6">
        <h2 class="text-xl sm:text-2xl font-bold mb-6">Incoming Friend Requests</h2>

        @forelse($friendRequests as $request)
            <div class="mb-4 p-4 border rounded-lg shadow-sm flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
                <!-- Sender Info -->
                <div class="flex items-center gap-4">
                    <img src="{{ $request->sender->avatar }}" alt="{{ $request->sender->name }}"
                         class="w-12 h-12 sm:w-14 sm:h-14 rounded-full object-cover">
                    <div>
                        <p class="font-semibold text-gray-900">{{ $request->sender->name }}</p>
                        <p class="text-gray-500 text-sm">{{ '@' . \Illuminate\Support\Str::slug($request->sender->name) }}</p>
                        {{-- <a href="{{ route('show', $request->sender->id) }}"
                           class="text-blue-600 hover:underline text-sm mt-1 inline-block">View Profile
                        </a> --}}
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex gap-2 mt-2 sm:mt-0">
                    <form action="{{ route('friend-request.accept', $request->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                            Accept
                        </button>
                    </form>

                    <form action="{{ route('friend-request.decline', $request->id) }}" method="POST">
                        @csrf
                        <button type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white text-sm px-4 py-2 rounded-lg shadow">
                            Decline
                        </button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-600">No pending friend requests.</p>
        @endforelse
    </div>
  </div>
@endsection


