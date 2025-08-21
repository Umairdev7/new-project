@extends('layouts.app')

@section('content')
@include('partial.user.user_header')

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
						<img src="{{ asset('img/friend1.jpg') }}" alt="friend">
					</div>

					<div class="friend-item-content">
						<div class="friend-avatar">
							<div class="author-thumb">
								{{-- <img src="img/avatar1.jpg" alt="author"> --}}
								<img src="{{ $friend->avatar }}" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">{{ $friend->name }}</a>
								<div class="country">{{ '@' . \Illuminate\Support\Str::slug($friend->name) }}</div>
							</div>
						</div>

						<div class="swiper-container" data-slide="fade">
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="{{ route('show', $friend->id) }}" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
										</a>
									</div>
								</div>

								<div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
                                        {{ $friend->about }}
                                    </p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
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

	</div>
</div>

@endsection
