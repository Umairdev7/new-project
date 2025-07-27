<!-- Your Account Personal Information -->
@extends('layouts.app')
@section('content')

@include('partial.profile_header')
<div class="container">
	<div class="row">
		<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
			<div class="ui-block">
				<div class="ui-block-title">
					<h6 class="title">Friend Requests</h6>
					<a href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg></a>
				</div>


				<!-- Notification List Frien Requests -->

				<ul class="notification-list friend-requests">

                    @forelse($friendRequests as $request)

					<li>
						<div class="author-thumb">
							{{-- <img src="img/avatar15-sm.jpg" alt="author"> --}}
							<img src="{{ $request->sender->avatar }}" alt="{{ $request->sender->name }}">
						</div>
						<div class="notification-event">
							{{-- <a href="#" class="h6 notification-friend">Tamara Romanoff</a> --}}
							<a href="#" class="h6 notification-friend">{{ $request->sender->name }}</a>
							{{-- <span class="chat-message-item">Mutual Friend: Sarah Hetfield</span> --}}
							<span class="chat-message-item"><p class="text-sm text-gray-500">{{ '@' . \Illuminate\Support\Str::slug($request->sender->name) }}</p></span>
						</div>
						{{-- <span class="notification-icon">
											<a href="#" class="accept-request">
												<span class="icon-add">
													<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
												</span>
												Accept Friend Request
											</a>

											<a href="#" class="accept-request request-del">
												<span class="icon-minus">
													<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
												</span>
											</a>

						</span> --}}
                        <span class="notification-icon">
                            <form action="{{ route('friend-request.accept', $request->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="accept-request">
                                    <span class="icon-add">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                    </span>
                                    Accept Friend Request
                                </button>
                            </form>

                            <form action="{{ route('friend-request.decline', $request->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="accept-request request-del">
                                    <span class="icon-minus">
                                    <svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
                                    </span>
                                </button>
                            </form>
                        </span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					{{-- <li>
						<div class="author-thumb">
							<img src="img/avatar16-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Tony Stevens</a>
							<span class="chat-message-item">4 Friends in Common</span>
						</div>
						<span class="notification-icon">
											<a href="#" class="accept-request">
												<span class="icon-add">
													<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
												</span>
												Accept Friend Request
											</a>

											<a href="#" class="accept-request request-del">
												<span class="icon-minus">
													<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
												</span>
											</a>

										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li class="accepted">
						<div class="author-thumb">
							<img src="img/avatar17-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							You and <a href="#" class="h6 notification-friend">Mary Jane Stark</a> just became friends. Write on <a href="#" class="notification-link">his wall</a>.
						</div>
						<span class="notification-icon">
											<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li>

					<li>
						<div class="author-thumb">
							<img src="img/avatar18-sm.jpg" alt="author">
						</div>
						<div class="notification-event">
							<a href="#" class="h6 notification-friend">Stagg Clothing</a>
							<span class="chat-message-item">9 Friends in Common</span>
						</div>
						<span class="notification-icon">
											<a href="#" class="accept-request">
												<span class="icon-add">
													<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
												</span>
												Accept Friend Request
											</a>

											<a href="#" class="accept-request request-del">
												<span class="icon-minus">
													<svg class="olymp-happy-face-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-happy-face-icon"></use></svg>
												</span>
											</a>

										</span>

						<div class="more">
							<svg class="olymp-three-dots-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use></svg>
							<svg class="olymp-little-delete"><use xlink:href="svg-icons/sprites/icons.svg#olymp-little-delete"></use></svg>
						</div>
					</li> --}}

                @empty
                    <p class="text-gray-600">No pending friend requests.</p>
                @endforelse

				</ul>

				<!-- ... end Notification List Frien Requests -->
			</div>

		</div>

		<div class="col col-xl-3 order-xl-1 col-lg-3 order-lg-1 col-md-12 order-md-2 col-sm-12 col-12 responsive-display-none">
			<div class="ui-block">

				<!-- Your Profile  -->

				<div class="your-profile">
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">Your PROFILE</h6>
					</div>

					<div id="accordion" role="tablist" aria-multiselectable="true">
						<div class="card">
							<div class="card-header" role="tab" id="headingOne">
								<h6 class="mb-0">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										Profile Settings
										<svg class="olymp-dropdown-arrow-icon"><use xlink:href="svg-icons/sprites/icons.svg#olymp-dropdown-arrow-icon"></use></svg>
									</a>
								</h6>
							</div>

							<div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
								<ul class="your-profile-menu">
									<li>
										<a href="28-YourAccount-PersonalInformation.html">Personal Information</a>
									</li>
									<li>
										<a href="29-YourAccount-AccountSettings.html">Account Settings</a>
									</li>
									<li>
										<a href="30-YourAccount-ChangePassword.html">Change Password</a>
									</li>
									<li>
										<a href="31-YourAccount-HobbiesAndInterests.html">Hobbies and Interests</a>
									</li>
									<li>
										<a href="32-YourAccount-EducationAndEmployement.html">Education and Employement</a>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<div class="ui-block-title">
						<a href="33-YourAccount-Notifications.html" class="h6 title">Notifications</a>
						<a href="#" class="items-round-little bg-primary">8</a>
					</div>
					<div class="ui-block-title">
						<a href="34-YourAccount-ChatMessages.html" class="h6 title">Chat / Messages</a>
					</div>
					<div class="ui-block-title">
						<a href="35-YourAccount-FriendsRequests.html" class="h6 title">Friend Requests</a>
						<a href="#" class="items-round-little bg-blue">4</a>
					</div>
					<div class="ui-block-title ui-block-title-small">
						<h6 class="title">FAVOURITE PAGE</h6>
					</div>
					<div class="ui-block-title">
						<a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Create Fav Page</a>
					</div>
					<div class="ui-block-title">
						<a href="36-FavPage-SettingsAndCreatePopup.html" class="h6 title">Fav Page Settings</a>
					</div>
				</div>

				<!-- ... end Your Profile  -->

			</div>
		</div>
	</div>
</div>
@endsection

<!-- ... end Your Account Personal Information -->
