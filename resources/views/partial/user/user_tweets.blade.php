		<div class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
			<div id="newsfeed-items-grid">

                @foreach ($tweets as $tweet)
				<div class="ui-block">
					<!-- Post -->

					<article class="hentry post">

							<div class="post__author author vcard inline-items">
								<img src="{{ $tweet->user->avatar }}" alt="author">

								<div class="author-date">
									<a class="h6 post__author-name fn" href="02-ProfilePage.html">{{ $tweet->user->name }}</a>
									<div class="post__date">
										<time class="published" datetime="2017-03-24T18:18">
											{{ $tweet->created_at->diffForHumans() }}
										</time>
									</div>
								</div>

								<div class="more">
									<svg class="olymp-three-dots-icon">
										<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
									</svg>
									<ul class="more-dropdown">
										<li>
											<a href="#">Edit Post</a>
										</li>
										<li>
											<a href="#">Delete Post</a>
										</li>
										<li>
											<a href="#">Turn Off Notifications</a>
										</li>
										<li>
											<a href="#">Select as Featured</a>
										</li>
									</ul>
								</div>

							</div>
							<p>
                                {!! $tweet->body !!}
							</p>
                        {{-- @if($tweet->image_path)
                            <div class="post-thumb">
                                <img src="{{ asset('storage/' . $tweet->image_path) }}" alt="Post image" width="300">
							</div>
                        @endif --}}

                            @if($tweet->images->count() === 1)
                            <!-- Just 1 image -->
                                <div class="post-thumb">
                                    <img src="{{ asset('storage/' . $tweet->images->first()->path) }}" alt="Post image" width="400">
                                </div>
                            @elseif($tweet->images->count() > 1)
                            <!-- Multiple images = gallery -->
                                <div class="post-gallery d-flex flex-wrap gap-2">
                                    @foreach($tweet->images as $img)
                                        <div class="gallery-item" style="flex: 1 1 calc(50% - 10px);">
                                            <img src="{{ asset('storage/' . $img->path) }}" alt="Post image" class="img-fluid rounded">
                                        </div>
                                    @endforeach
                                </div>
                            @endif

							<div class="post-additional-info inline-items">
                    @auth
                        @if(auth()->user()->bookmarkedTweets->contains($tweet->id))
                            <form action="{{ route('bookmarks.destroy', $tweet->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="post-add-icon inline-items text-blue-500 hover:text-blue-700" style="background:none; border:none; padding:0; cursor:pointer;">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                                    </svg>
                                </button>
                            </form>
                        @else
                            <form action="{{ route('bookmarks.store') }}" method="POST" class="inline">
                                @csrf
                                <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
                                <button type="submit" class="post-add-icon inline-items text-gray-500 hover:text-blue-500" style="background:none; border:none; padding:0; cursor:pointer;">
                                    <svg class="olymp-heart-icon">
                                        <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-heart-icon') }}"></use>
                                    </svg>
                                </button>
                            </form>
                        @endif
                    @endauth
                                <ul class="friends-harmonic">
                                @foreach($tweet->bookmarkedBy->take(5) as $user)
                                    <li>
                                        <a href="{{ route('profile', $user->id) }}">
                                            <img src="{{ $user->avatar }}" alt="{{ $user->name }}">
                                        </a>
                                    </li>
                                 @endforeach
                                </ul>

                                <div class="names-people-likes">
                                @php
                                    $total = $tweet->bookmarkedBy->count();
                                    $names = $tweet->bookmarkedBy->take(2)->pluck('name')->toArray();
                                @endphp

                                @if($total > 0)
                                    <a href="#">{{ $names[0] ?? '' }}</a>
                                    @if(isset($names[1]))
                                        , <a href="#">{{ $names[1] }}</a>
                                    @endif
                                    @if($total > 2)
                                        and <br>{{ $total - 2 }} more liked this
                                    @endif
                                @endif
                            </div>


								<div class="comments-shared">
										<svg class="olymp-speech-balloon-icon">
                                            <i class="fa fa-thumbs-up"></i>
										</svg>
										<span>{{ $tweet->bookmarkedBy->count() }}</span>
								</div>
							</div>
							<div class="control-block-button post-control-button">
                                @auth
    @if(auth()->user()->bookmarkedTweets->contains($tweet->id))
        <a href="{{ route('bookmarks.destroy', $tweet->id) }}"
           onclick="event.preventDefault(); document.getElementById('unbookmark-{{ $tweet->id }}').submit();"
           class="btn btn-control text-blue-500 hover:text-blue-700">
            <svg class="olymp-like-post-icon">
                <use xlink:href="svg-icons/sprites/icons.svg#olymp-like-post-icon"></use>
            </svg>
        </a>
        <form id="unbookmark-{{ $tweet->id }}" action="{{ route('bookmarks.destroy', $tweet->id) }}" method="POST" style="display:none;">
            @csrf
            @method('DELETE')
        </form>
    @else
        <a href="{{ route('bookmarks.store') }}"
           onclick="event.preventDefault(); document.getElementById('bookmark-{{ $tweet->id }}').submit();"
           class="btn btn-control text-gray-500 hover:text-blue-500">
            <svg class="olymp-like-post-icon">
                <use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-like-post-icon') }}"></use>
            </svg>
        </a>

        <form id="bookmark-{{ $tweet->id }}" action="{{ route('bookmarks.store') }}" method="POST" style="display:none;">
            @csrf
            <input type="hidden" name="tweet_id" value="{{ $tweet->id }}">
        </form>
    @endif
@endauth
							</div>

						</article>

                    </div>
                    @endforeach
                <!-- .. end Post -->

			</div>

			<a id="load-more-button" href="#" class="btn btn-control btn-more" data-load-link="items-to-load.html" data-container="newsfeed-items-grid">
				<svg class="olymp-three-dots-icon">
					<use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-three-dots-icon') }}"></use>
				</svg>
			</a>
		</div>
