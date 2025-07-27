                {{-- <div class="flex p-4 border-b border-b-gray-400"> --}}
                    {{-- <a href="{{ route('profile') }}"> --}}
                    {{-- <a href="{{ route('profile', $tweet->user->id) }}">

                    <div class="mr-2 flex-shrink-0">
                        <img src="{{ $tweet->user->avatar }}"
                        alt=""
                        class="rounded-full mr-2"
                        >
                    </div>
                    </a>
                    <div> --}}
                            {{-- <a href="{{ route('profile') }}"> --}}
                            {{-- <a href="{{ route('profile', $tweet->user->id) }}">


                            <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>

                            <a href="{{ route('viewtweet', $tweet->id) }}">
                            <p class="text-sm"><b>{{ $tweet->title }}</b></p>
                            <span class="text-sm text-gray-500">{{ $tweet->created_at->diffForHumans() }}</span>
                            </a>
                    </div>
                </div> --}}

                {{-- 2 --}}

                <div class="flex p-4 border-b border-b-gray-400">
    <a href="{{ route('profile', $tweet->user->id) }}">
        <div class="mr-2 flex-shrink-0">
            <img src="{{ $tweet->user->avatar }}" alt="" class="rounded-full mr-2">
        </div>
    </a>

    <div>
        <a href="{{ route('profile', $tweet->user->id) }}">
            <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
        </a>

        <a href="{{ route('viewtweet', $tweet->id) }}">
            <p class="text-sm"><b>{{ $tweet->title }}</b></p>
            <span class="text-sm text-gray-500">{{ $tweet->created_at->diffForHumans() }}</span>
        </a>

        {{-- Bookmark Button --}}
        <div class="mt-2">
            @auth
                @if(auth()->user()->bookmarkedTweets->contains($tweet->id))
                    <form action="{{ route('bookmarks.destroy', $tweet->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-bookmark"></i> Bookmarked
                        </button>
                    </form>
                @else
                    <form action="{{ route('bookmarks.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                        <button type="submit" class="text-gray-500 hover:text-blue-500">
                            <i class="far fa-bookmark"></i> Bookmark
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
</div>
