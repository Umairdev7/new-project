@extends('layouts.app')

@section('content')
    @include('partial.profile_header')

    <div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					<div class="h6 title">
                        Find Friends
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Friends -->

<div class="container">
	<div class="row">

        @foreach($users as $user)

		<div class="col col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
			<div class="ui-block">

				<!-- Friend Item -->

				<div class="friend-item">
					<div class="friend-header-thumb">
						<img src="img/friend1.jpg" alt="friend">
					</div>

					<div class="friend-item-content">
						<div class="friend-avatar">
							<div class="author-thumb">
								<img src="{{ $user->avatar }}" alt="author">
							</div>
							<div class="author-content">
								<a href="#" class="h5 author-name">{{ $user->name }}</a>
								<div class="country">{{ '@' . \Illuminate\Support\Str::slug($user->name) }}</div>
							</div>
						</div>

						{{-- <div class="swiper-container" data-slide="fade"> --}}
							<div class="swiper-wrapper">
								<div class="swiper-slide">
									<div class="control-block-button" data-swiper-parallax="-100">
										<a href="{{ route('show', $user->id) }}" class="btn btn-control bg-blue">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</a>
									</div>
								</div>

								{{-- <div class="swiper-slide">
									<p class="friend-about" data-swiper-parallax="-500">
                                        {{ $user->about }}
                                    </p>

									<div class="friend-since" data-swiper-parallax="-100">
										<span>Friends Since:</span>
                                        <div class="h6">{{ $user->created_at->diffForHumans() }}</div>
									</div>
								</div> --}}
							</div>

							<!-- If we need pagination -->
							<div class="swiper-pagination"></div>
						{{-- </div> --}}
					</div>
				</div>

				<!-- ... end Friend Item -->			</div>
		</div>

        @endforeach

</div>

@endsection
