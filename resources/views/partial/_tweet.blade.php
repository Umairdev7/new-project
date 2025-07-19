                <div class="flex p-4 border-b border-b-gray-400">
                    <a href="{{ route('viewtweet', $tweet->id) }}">
                    <div class="mr-2 flex-shrink-0">
                        <img src="{{ $tweet->user->avatar }}"
                        alt=""
                        class="rounded-full mr-2"
                        >
                    </div>

                    <div>
                            <h5 class="font-bold mb-4">{{ $tweet->user->name }}</h5>
                            <p class="text-sm"><b>{{ $tweet->title }}</b></p>
                            <span class="text-sm text-gray-500">{{ $tweet->created_at->diffForHumans() }}</span>
                        </a>

                        {{-- <p class="text-sm">{{ $tweet->body }}</p> --}}

                        {{-- <a href="{{ route('viewtweet', $tweet->id) }}" class="btn btn-primary btn-sm bg-blue-500 text-white">View</a> --}}

                        {{-- <a href="{{ route('viewtweet', $tweet->id) }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition">
                             View
                        </a> --}}

                        {{-- <a href="{{ route('viewtweet', $tweet->id) }}" class="inline-block px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-lg ">
                             View
                        </a> --}}



                        {{-- <button type="submit" class="bg-blue-500 rounded-lg shadow py-2 px-2 text-white">View</button> --}}

                    </div>
                </div>
