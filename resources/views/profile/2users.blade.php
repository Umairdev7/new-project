@extends('layouts.app')

@section('content')
    <div class="min-h-full">  <!-- Ensures content fills available height -->

    {{-- <div class="max-w-3xl mx-auto p-4"> --}}
        <h2 class="text-2xl font-bold mb-6">All Users</h2>

        @foreach($users as $user)
            <div class="flex items-center mb-4 border-b pb-2">
                <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full mr-4">

                <div>
                    {{-- <a href="{{ route('profile', ['user' => $user->id]) }}" class="text-lg font-semibold hover:underline"> --}}
                    <a href="{{ route('show', $user->id) }}" class="text-lg font-semibold hover:underline">
                        {{ $user->name }}
                    </a>
                    <p class="text-sm text-gray-600">{{ '@' . \Illuminate\Support\Str::slug($user->name) }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
