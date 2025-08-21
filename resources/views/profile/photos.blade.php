@extends('layouts.app')
@section('content')

@include('partial.profile_header')

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block responsive-flex">
				<div class="ui-block-title">
					{{-- <div class="h6 title">James’s Photo Gallery</div> --}}
					<div class="h6 title">{{ auth()->user()->name }}’s Photo Gallery</div>

					<div class="block-btn align-right">
						<a href="#" data-toggle="modal" data-target="#create-photo-album" class="btn btn-primary btn-md-2">Create Album  +</a>

						<a href="#" data-toggle="modal" data-target="#update-header-photo" class="btn btn-md-2 btn-border-think custom-color c-grey">Add Photos</a>
					</div>

					<ul class="nav nav-tabs photo-gallery" role="tablist">
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#photo-page" role="tab">
								<svg class="olymp-photos-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-photos-icon"></use></svg>
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#album-page" role="tab">
								<svg class="olymp-albums-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-albums-icon"></use></svg>
							</a>
						</li>

					</ul>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<!-- Tab panes -->
			<div class="tab-content">
				<div class="tab-pane" id="photo-page" role="tabpanel">

					<div class="photo-album-wrapper">



						<div class="photo-item half-width">
							<img src="img/photo-item1.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item2.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item3.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item4.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item5.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item6.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item7.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item8.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item9.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item10.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<div class="photo-item col-4-width">
							<img src="img/photo-item11.jpg" alt="photo">
							<div class="overlay overlay-dark"></div>
							<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
							<a href="#" class="post-add-icon inline-items">
								<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
								<span>15</span>
							</a>
							<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
							<div class="content">
								<a href="#" class="h6 title">Header Photos</a>
								<time class="published" datetime="2017-03-24T18:18">1 week ago</time>
							</div>
						</div>


						<a href="#" class="btn btn-control btn-more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>

					</div>

				</div>

				<div class="tab-pane active" id="album-page" role="tabpanel">

					<div class="photo-album-wrapper">

						<div class="photo-album-item-wrap col-4-width" >

							<div class="photo-album-item create-album" data-mh="album-item">

								<a href="#" data-toggle="modal" data-target="#create-photo-album" class="  full-block"></a>

								<div class="content">

									<a href="#" class="btn btn-control bg-primary" data-toggle="modal" data-target="#create-photo-album">
										<svg class="olymp-plus-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-plus-icon"></use></svg>
									</a>

									<a href="#" class="title h5" data-toggle="modal" data-target="#create-photo-album">Create an Album</a>
									<span class="sub-title">It only takes a few minutes!</span>

								</div>

							</div>
						</div>

						{{-- <div class="photo-album-item-wrap col-4-width">


							<div class="photo-album-item" data-mh="album-item">
								<div class="photo-item">
									<img src="img/photo-item2.jpg" alt="photo">
									<div class="overlay overlay-dark"></div>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
									<a href="#" class="post-add-icon">
										<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										<span>324</span>
									</a>
									<a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="  full-block"></a>
								</div>

								<div class="content">
									<a href="#" class="title h5">South America Vacations</a>
									<span class="sub-title">Last Added: 2 hours ago</span>

									<div class="swiper-container">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<ul class="friends-harmonic">
													<li>
														<a href="#">
															<img src="img/friend-harmonic5.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic10.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic7.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic8.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic2.jpg" alt="friend">
														</a>
													</li>
												</ul>
											</div>

											<div class="swiper-slide">
												<div class="friend-count" data-swiper-parallax="-500">
													<a href="#" class="friend-count-item">
														<div class="h6">24</div>
														<div class="title">Photos</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">86</div>
														<div class="title">Comments</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">16</div>
														<div class="title">Share</div>
													</a>
												</div>
											</div>
										</div>

										<!-- If we need pagination -->
										<div class="swiper-pagination"></div>
									</div>
								</div>

							</div>
						</div> --}}

@foreach ($userImages as $tweet)
<div class="photo-album-item-wrap col-4-width">
{{-- @php
    $userImages = \App\Models\Tweet::where('user_id', auth()->id())
        ->whereNotNull('image_path')
        ->get();
@endphp --}}
    <div class="photo-album-item" data-mh="album-item">
        <div class="photo-item">
            <img src="{{ asset('storage/' . $tweet->image_path) }}" alt="photo">
            <div class="overlay overlay-dark"></div>
            <a href="#" data-toggle="modal" data-target="#open-photo-popup-v2" class="full-block"></a>
        </div>
    </div>
</div>
@endforeach


						{{-- <div class="photo-album-item-wrap col-4-width">


							<div class="photo-album-item" data-mh="album-item">
								<div class="photo-item">
									<img src="img/photo-album1.jpg" alt="photo">
									<div class="overlay overlay-dark"></div>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
									<a href="#" class="post-add-icon">
										<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										<span>324</span>
									</a>

									<a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
								</div>

								<div class="content">
									<a href="#" class="title h5">Photoshoot Summer 2016</a>
									<span class="sub-title">Last Added: 5 weeks ago</span>

									<div class="swiper-container" data-slide="fade">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<ul class="friends-harmonic">
													<li>
														<a href="#">
															<img src="img/friend-harmonic5.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic10.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic7.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic8.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic2.jpg" alt="friend">
														</a>
													</li>
												</ul>
											</div>

											<div class="swiper-slide">
												<div class="friend-count" data-swiper-parallax="-500">
													<a href="#" class="friend-count-item">
														<div class="h6">24</div>
														<div class="title">Photos</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">86</div>
														<div class="title">Comments</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">16</div>
														<div class="title">Share</div>
													</a>
												</div>
											</div>
										</div>

										<!-- If we need pagination -->
										<div class="swiper-pagination"></div>
									</div>
								</div>

							</div>
						</div>

						<div class="photo-album-item-wrap col-4-width">


							<div class="photo-album-item" data-mh="album-item">
								<div class="photo-item">
									<img src="img/photo-album2.jpg" alt="photo">
									<div class="overlay overlay-dark"></div>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
									<a href="#" class="post-add-icon">
										<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										<span>324</span>
									</a>

									<a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
								</div>

								<div class="content">
									<a href="#" class="title h5">Amazing Street Food</a>
									<span class="sub-title">Last Added: 6 mins ago</span>

									<div class="swiper-container" data-slide="fade">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<ul class="friends-harmonic">
													<li>
														<a href="#">
															<img src="img/friend-harmonic10.jpg" alt="friend">
														</a>
													</li>
												</ul>
											</div>

											<div class="swiper-slide">
												<div class="friend-count" data-swiper-parallax="-500">
													<a href="#" class="friend-count-item">
														<div class="h6">24</div>
														<div class="title">Photos</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">86</div>
														<div class="title">Comments</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">16</div>
														<div class="title">Share</div>
													</a>
												</div>
											</div>
										</div>

										<!-- If we need pagination -->
										<div class="swiper-pagination"></div>
									</div>
								</div>

							</div>
						</div>

						<div class="photo-album-item-wrap col-4-width">

							<div class="photo-album-item" data-mh="album-item">
								<div class="photo-item">
									<img src="img/photo-album3.jpg" alt="photo">
									<div class="overlay overlay-dark"></div>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
									<a href="#" class="post-add-icon">
										<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										<span>324</span>
									</a>

									<a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
								</div>

								<div class="content">
									<a href="#" class="title h5">Graffiti & Street Art</a>
									<span class="sub-title">Last Added: 16 hours ago</span>

									<div class="swiper-container" data-slide="fade">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<ul class="friends-harmonic">
													<li>
														<a href="#">
															<img src="img/friend-harmonic10.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic7.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic8.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic2.jpg" alt="friend">
														</a>
													</li>
												</ul>
											</div>

											<div class="swiper-slide">
												<div class="friend-count" data-swiper-parallax="-500">
													<a href="#" class="friend-count-item">
														<div class="h6">24</div>
														<div class="title">Photos</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">86</div>
														<div class="title">Comments</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">16</div>
														<div class="title">Share</div>
													</a>
												</div>
											</div>
										</div>

										<!-- If we need pagination -->
										<div class="swiper-pagination"></div>
									</div>
								</div>

							</div>

						</div>

						<div class="photo-album-item-wrap col-4-width">


							<div class="photo-album-item" data-mh="album-item">
								<div class="photo-item">
									<img src="img/photo-album4.jpg" alt="photo">
									<div class="overlay overlay-dark"></div>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
									<a href="#" class="post-add-icon">
										<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										<span>324</span>
									</a>

									<a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
								</div>

								<div class="content">
									<a href="#" class="title h5">Amazing Landscapes</a>
									<span class="sub-title">Last Added: 13 mins ago</span>

									<div class="swiper-container" data-slide="fade">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<ul class="friends-harmonic">
													<li>
														<a href="#">
															<img src="img/friend-harmonic5.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic10.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic7.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic8.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/friend-harmonic2.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/avatar30-sm.jpg" alt="author">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/avatar29-sm.jpg" alt="user">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/avatar28-sm.jpg" alt="user">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/avatar27-sm.jpg" alt="user">
														</a>
													</li>
													<li>
														<a href="#" class="all-users">+3</a>
													</li>
												</ul>
											</div>

											<div class="swiper-slide">
												<div class="friend-count" data-swiper-parallax="-500">
													<a href="#" class="friend-count-item">
														<div class="h6">24</div>
														<div class="title">Photos</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">86</div>
														<div class="title">Comments</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">16</div>
														<div class="title">Share</div>
													</a>
												</div>
											</div>
										</div>

										<!-- If we need pagination -->
										<div class="swiper-pagination"></div>
									</div>
								</div>

							</div>
						</div>

						<div class="photo-album-item-wrap col-4-width">


							<div class="photo-album-item" data-mh="album-item">
								<div class="photo-item">
									<img src="img/photo-item6.jpg" alt="photo">
									<div class="overlay overlay-dark"></div>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
									<a href="#" class="post-add-icon">
										<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										<span>324</span>
									</a>

									<a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
								</div>

								<div class="content">
									<a href="#" class="title h5">The Majestic Canyon</a>
									<span class="sub-title">Last Added: 57 mins ago</span>

									<div class="swiper-container" data-slide="fade">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<ul class="friends-harmonic">
													<li>
														<a href="#">
															<img src="img/friend-harmonic10.jpg" alt="friend">
														</a>
													</li>
												</ul>
											</div>

											<div class="swiper-slide">
												<div class="friend-count" data-swiper-parallax="-500">
													<a href="#" class="friend-count-item">
														<div class="h6">24</div>
														<div class="title">Photos</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">86</div>
														<div class="title">Comments</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">16</div>
														<div class="title">Share</div>
													</a>
												</div>
											</div>
										</div>

										<!-- If we need pagination -->
										<div class="swiper-pagination"></div>
									</div>
								</div>

							</div>
						</div>

						<div class="photo-album-item-wrap col-4-width">


							<div class="photo-album-item" data-mh="album-item">
								<div class="photo-item">
									<img src="img/photo-album5.jpg" alt="photo">
									<div class="overlay overlay-dark"></div>
									<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
									<a href="#" class="post-add-icon">
										<svg class="olymp-heart-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-heart-icon"></use></svg>
										<span>324</span>
									</a>

									<a href="#" data-toggle="modal" data-target="#open-photo-popup-v1" class="  full-block"></a>
								</div>

								<div class="content">
									<a href="#" class="title h5">Winter 2015 Portraits</a>
									<span class="sub-title">Last Added: 1 year ago</span>

									<div class="swiper-container" data-slide="fade">
										<div class="swiper-wrapper">
											<div class="swiper-slide">
												<ul class="friends-harmonic">
													<li>
														<a href="#">
															<img src="img/friend-harmonic10.jpg" alt="friend">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/avatar30-sm.jpg" alt="author">
														</a>
													</li>
													<li>
														<a href="#">
															<img src="img/avatar29-sm.jpg" alt="user">
														</a>
													</li>
												</ul>
											</div>

											<div class="swiper-slide">
												<div class="friend-count" data-swiper-parallax="-500">
													<a href="#" class="friend-count-item">
														<div class="h6">24</div>
														<div class="title">Photos</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">86</div>
														<div class="title">Comments</div>
													</a>
													<a href="#" class="friend-count-item">
														<div class="h6">16</div>
														<div class="title">Share</div>
													</a>
												</div>
											</div>
										</div>

										<!-- If we need pagination -->
										<div class="swiper-pagination"></div>
									</div>
								</div>

							</div>
						</div> --}}

					</div>

				</div>
			</div>

		</div>
	</div>
</div>

@endsection
