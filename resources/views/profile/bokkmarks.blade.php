@extends('layouts.app')

@section('content')
    <div class="min-h-full">
        <div class="mb-4 p-4 bg-white rounded-lg shadow">
            <h3 class="font-bold text-lg mb-4">Bookmarked Tweets</h3>

            @forelse(auth()->user()->bookmarkedTweets as $bookmarkedTweet)
                <div class="flex items-start mb-4 pb-4 border-b border-gray-200 last:border-0">
                    <!-- User Avatar -->
                    <a href="{{ route('profile', $bookmarkedTweet->user->id) }}" class="mr-3 flex-shrink-0">
                        <img src="{{ $bookmarkedTweet->user->avatar }}"
                             alt="{{ $bookmarkedTweet->user->name }}'s avatar"
                             class="w-10 h-10 rounded-full object-cover">
                    </a>

                    <!-- Tweet Content -->
                    <div class="flex-1">
                        <div class="flex items-center mb-1">
                            <a href="{{ route('profile', $bookmarkedTweet->user->id) }}" class="font-bold mr-2 hover:underline">
                                {{ $bookmarkedTweet->user->name }}
                            </a>
                            <span class="text-sm text-gray-500">· {{ $bookmarkedTweet->created_at->diffForHumans() }}</span>
                        </div>

                        <a href="{{ route('viewtweet', $bookmarkedTweet->id) }}" class="block hover:bg-gray-50 rounded p-1 -ml-1">
                            <p class="text-gray-800 mb-2">{{ $bookmarkedTweet->title }}</p>

                            @if($bookmarkedTweet->image)
                                <div class="mt-2 rounded-lg overflow-hidden border border-gray-200">
                                    <img src="{{ $bookmarkedTweet->image }}"
                                         alt="Tweet image"
                                         class="w-full h-auto max-h-60 object-cover">
                                </div>
                            @endif
                        </a>

                        <!-- Bookmark Button -->
                        <div class="mt-2">
                            <form action="{{ route('bookmarks.destroy', $bookmarkedTweet->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-blue-500 hover:text-blue-700 text-sm">
                                    <i class="fas fa-bookmark mr-1"></i> Remove bookmark
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <i class="far fa-bookmark text-gray-400 text-4xl mb-2"></i>
                    <p class="text-gray-500">You haven't bookmarked any tweets yet</p>
                    <p class="text-sm text-gray-400 mt-2">When you bookmark tweets, they'll appear here</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
