@extends('layouts.app')
@section('content')

@include('partial.user.user_profile_header')

<div class="container">
	<div class="row">


		<!-- Main Content -->
        {{-- @foreach ($tweets as $tweet) --}}
        @include("partial.user.user_tweets")
        {{-- @endforeach --}}

		<!-- Left Sidebar -->
        @include('partial.left_profile')

		<!-- Right Sidebar -->
        @include('partial.right_profile')

	</div>
</div>

@endsection
