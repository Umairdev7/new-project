{{-- @extends('layouts.app')
@section('content')

@include('partial.user.user_profile_header')

<div class="container">
	<div class="row">


		<!-- Main Content -->
        @include("partial.user.user_tweets")

		<!-- Left Sidebar -->
        @include('partial.left_profile')

		<!-- Right Sidebar -->
        @include('partial.right_profile')

	</div>
</div>

@endsection --}}

@extends('layouts.app')
@section('content')

@include('partial.user.user_profile_header')

<div class="container">
    <div class="row">
        @if ($isFriend || auth()->id() === $user->id)
            <!-- Main Content Only for Friends or Self -->
            @include("partial.user.user_tweets")
            @include('partial.left_profile')
            @include('partial.right_profile')
        @else
            <!-- Show only Add Friend Button (already inside user_profile_header) -->
            <div class="col-12 text-center mt-5">
                <p class="text-gray-500">🔒 This profile is private. Add as a friend to see more!</p>
            </div>
        @endif
    </div>
</div>

@endsection
