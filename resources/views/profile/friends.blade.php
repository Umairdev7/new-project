@extends('layouts.app')

@section('content')
    @include('partial.profile_header')

    <div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">{{ $user->name }}'s Friends ({{ $user->friends->count() }}) </div>
					<form class="w-search">
						<div class="form-group with-button">
							<input class="form-control" type="text" placeholder="Search Friends...">
							<button>
								<svg class="olymp-magnifying-glass-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-magnifying-glass-icon"></use></svg>
							</button>
						</div>
					</form>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Friends -->

<div class="container">
	<div class="row">

        {{-- @if ($user->friends->count()) --}}

        @foreach ($user->friends as $friend)

		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- Friend Item -->

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend1.jpg" alt="friend">
					</div>

					<div class="friend-item-content">

						{{-- <div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div> --}}
						<div class="friend-avatar">
							<div class="author-thumb">
								{{-- <img src="img/avatar1.jpg" alt="author"> --}}
								<img src="{{ $friend->avatar }}" alt="author">
							</div>
							<div class="author-content">
								{{-- <a href="#" class="h5 author-name">Nicholas Grissom</a> --}}
								<a href="#" class="h5 author-name">{{ $friend->name }}</a>
								{{-- <div class="country">San Francisco, CA</div> --}}
								<div class="country">{{ '@' . \Illuminate\Support\Str::slug($friend->name) }}</div>
							</div>
						</div>

						<div class="swiper-container" data-slide="fade">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									{{-- <div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">52</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">240</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">16</div>
											<div class="title">Videos</div>
										</a>
									</div> --}}
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="{{ route('show', $friend->id) }}" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										{{-- <a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a> --}}

									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										{{-- Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother. --}}
                                        {{ $friend->about }}
                                    </p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										{{-- <div class="h6">December 2014</div> --}}
										<div class="h6">{{ $friend->created_at->diffForHumans() }}</div>
									</div>
								</div>
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>

				<!-- ... end Friend Item -->
            </div>
		</div>

        @endforeach

        {{-- @else
        <p class="text-gray-500">No friends to display.</p>
        @endif --}}

		{{-- <div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- Friend Item -->

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend2.jpg" alt="friend">
					</div>

					<div class="friend-item-content">

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="img/avatar2.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Marina Valentine</a>
								<div class="country">Long Island, NY</div>
							</div>
						</div>

						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">52</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">240</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">16</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>

				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- Friend Item -->

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend3.jpg" alt="friend">
					</div>

					<div class="friend-item-content">

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="img/avatar3.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Nicholas Grissom</a>
								<div class="country">Los Angeles, CA</div>
							</div>
						</div>

						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">49</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">132</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">5</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>

				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- Friend Item -->

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend4.jpg" alt="friend">
					</div>

					<div class="friend-item-content">
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>

						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="img/avatar4.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Chris Greyson</a>
								<div class="country">Austin, TX</div>
							</div>
						</div>

						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">65</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">104</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">12</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>

				<!-- ... end Friend Item -->			</div>
		</div>

		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- Friend Item -->

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend5.jpg" alt="friend">
					</div>

					<div class="friend-item-content">

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="img/avatar5.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Elaine Dreifuss</a>
								<div class="country">New York, NY</div>
							</div>
						</div>

						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">82</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">204</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">27</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>

				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- Friend Item -->

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend6.jpg" alt="friend">
					</div>

					<div class="friend-item-content">

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="img/avatar6.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Bruce Peterson</a>
								<div class="country">Austin, TX</div>
							</div>
						</div>

						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">73</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">360</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">11</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>

				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- Friend Item -->

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend7.jpg" alt="friend">
					</div>

					<div class="friend-item-content">

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="img/avatar7.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Carol Summers</a>
								<div class="country">Los Angeles, CA</div>
							</div>
						</div>

						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">49</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">132</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">5</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>

				<!-- ... end Friend Item -->			</div>
		</div>
		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- Friend Item -->

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend8.jpg" alt="friend">
					</div>

					<div class="friend-item-content">
						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<ul class="more-dropdown">
								<li>
									<a href="#">Report Profile</a>
								</li>
								<li>
									<a href="#">Block Profile</a>
								</li>
								<li>
									<a href="#">Turn Off Notifications</a>
								</li>
							</ul>
						</div>

						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="img/avatar8.jpg" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">Michael Maximoff</a>
								<div class="country">Portland, OR</div>
							</div>
						</div>

						<div class="swiper-container">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="friend-count" data-swiper-parallax="-500">
										<a href="#" class="friend-count-item">
											<div class="h6">58</div>
											<div class="title">Friends</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">304</div>
											<div class="title">Photos</div>
										</a>
										<a href="#" class="friend-count-item">
											<div class="h6">19</div>
											<div class="title">Videos</div>
										</a>
									</div>
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="#" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>

										<a href="#" class="btn btn-control bg-purple">
											<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
										</a>

									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
										Hi!, I’m Marina and I’m a Community Manager for “Gametube”. Gamer and full-time mother.
									</p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
										<div class="h6">December 2014</div>
									</div>
								</div>
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						</div>
					</div>
				</div>

				<!-- ... end Friend Item -->			</div>
		</div> --}}
	</div>
</div>

@endsection
