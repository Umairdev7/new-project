<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="img/top-header1.jpg" alt="nature">
						{{-- <img src="{{ $user->avater }}" alt="nature"> --}}
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="{{ route('home') }}" class="active">Timeline</a>
									</li>
									<li>
										{{-- <a href="05-ProfilePage-About.html">About</a> --}}
										<a href="{{ route('about') }}">About</a>
									</li>
									<li>
										{{-- <a href="06-ProfilePage.html">Friends</a> --}}
										<a href="{{ route('friends') }}">Friends</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="07-ProfilePage-Photos.html">Photos</a>
									</li>
									<li>
										<a href="09-ProfilePage-Videos.html">Videos</a>
									</li>
									<li>
										<div class="more">
											<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
											<ul class="more-dropdown more-with-triangle">
												<li>
													<a href="#">Report Profile</a>
												</li>
												<li>
													<a href="#">Block Profile</a>
												</li>
											</ul>
										</div>
									</li>
								</ul>
							</div>
						</div>

						<div class="control-block-button">
							{{-- <a href="35-YourAccount-FriendsRequests.html" class="btn btn-control bg-blue"> --}}
							<a href="{{ route('friend-requests.index') }}" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
							</a>

							{{-- <a href="#" class="btn btn-control bg-purple">
								<svg class="olymp-chat---messages-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-chat---messages-icon"></use></svg>
							</a>

							<div class="btn btn-control bg-primary more">
								<svg class="olymp-settings-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-settings-icon"></use></svg>

								<ul class="more-dropdown more-with-triangle triangle-bottom-right">
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Profile Photo</a>
									</li>
									<li>
										<a href="#" data-toggle="modal" data-target="#update-header-photo">Update Header Photo</a>
									</li>
									<li>
										<a href="29-YourAccount-AccountSettings.html">Account Settings</a>
									</li>
								</ul>
							</div> --}}
						</div>
					</div>
					<div class="top-header-author">
						<a href="{{ route('home') }}" class="author-thumb">
							{{-- <img src="img/author-main1.jpg" alt="author"> --}}
							{{-- <img src="{{ $user->avatar }}" alt="author"> --}}
							<img src="{{ auth()->user()->avatar }}" alt="author">
						</a>
						<div class="author-content">
							{{-- <a href="{{ route('home') }}" class="h4 author-name">James Spiegel</a> --}}
							{{-- <a href="{{ route('home') }}" class="h4 author-name">{{ $user->name }}</a> --}}
							<a href="{{ route('home') }}" class="h4 author-name">{{ auth()->user()->name }}</a>
							{{-- <div class="country">San Francisco, CA</div> --}}
							{{-- <div class="country"><p class="text-gray-500">{{ '@' . \Illuminate\Support\Str::slug($user->name) }}</p></div> --}}
							<div class="country"><p class="text-gray-500">{{ '@' . \Illuminate\Support\Str::slug(auth()->user()->name) }}</p></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
