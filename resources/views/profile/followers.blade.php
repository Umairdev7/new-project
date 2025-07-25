@extends('layouts.app')

@section('content')
    <div class="min-h-full">  <!-- Ensures content fills available height -->

{{-- <div class="max-w-2xl mx-auto p-6"> --}}
    <h2 class="text-xl font-bold mb-4">{{ $user->name }}'s Followers</h2>

    @forelse ($followers as $follower)
        <div class="flex items-center mb-4 p-4 border border-gray-200 rounded">
            <img src="{{ $follower->avatar }}" alt="" class="w-10 h-10 rounded-full mr-4">
            <div>
                {{-- <a href="{{ route('show', $follower->id) }}" class="text-lg font-semibold hover:underline"> --}}
                    <p class="font-semibold">{{ $follower->name }}</p>
                {{-- </a> --}}
                <p class="text-sm text-gray-500">{{ $follower->email }}</p>
            </div>
        </div>
    @empty
        <p class="text-gray-600">No followers yet.</p>
    @endforelse

    <div class="mt-4">
        {{ $followers->links() }}
    </div>
</div>
    {{-- </div> --}}
@endsection
