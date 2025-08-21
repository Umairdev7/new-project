<!-- Top Header-Profile -->

<div class="container">
	<div class="row">
		<div class="col col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="ui-block">
				<div class="top-header">
					<div class="top-header-thumb">
						<img src="{{ asset('images/cover.jpg') }}" alt="nature">
					</div>
					<div class="profile-section">
						<div class="row">
							<div class="col col-lg-5 col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="{{ route('home') }}" class="active">Timeline</a>
									</li>
									<li>
										<a href="{{ route('about') }}">About</a>
									</li>
									<li>
										<a href="{{ route('users.friends', $user) }}">Friends</a>
									</li>
								</ul>
							</div>
							<div class="col col-lg-5 ml-auto col-md-5 col-sm-12 col-12">
								<ul class="profile-menu">
									<li>
										<a href="{{ route('photos') }}">Photos</a>
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

						{{-- <div class="control-block-button">
							<a href="{{ route('friend-requests.index') }}" class="btn btn-control bg-blue">
								<svg class="olymp-happy-face-icon"><use xlink:href="{{ asset('svg-icons/sprites/icons.svg#olymp-happy-face-icon') }}"></use></svg>
							</a>
						</div> --}}






					</div>
					<div class="top-header-author">
						<a href="{{ route('home') }}" class="author-thumb">
							<img src="{{ $user->avatar }}" alt="author"
                            style="width:100%;height:100%;object-fit:cover;border-radius:50%;display:block;">>
						</a>
						<div class="author-content">
							<a href="{{ route('home') }}" class="h4 author-name">{{ $user->name }}</a>


							{{-- <div class="country"><p class="text-gray-500">{{ '@' . \Illuminate\Support\Str::slug($user->name) }}</p></div> --}}
						{{-- </div> --}}

{{-- @if(auth()->check() && auth()->id() !== $user->id)
        <div class="profile-action-buttons mt-2">
            <!-- Follow Button -->
            <button class="btn btn-primary btn-sm mr-2">
                Follow
            </button>

            <!-- Friend Request Button -->
            <button class="btn btn-outline-primary btn-sm">
                <i class="fa fa-user-plus mr-1"></i> Add Friend
            </button>
        </div>
@endif --}}


					</div>
				</div>
			</div>
		</div>
	</div>
</div>
