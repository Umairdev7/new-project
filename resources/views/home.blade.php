@extends('layouts.app')

@section('content')
    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
            @include('partial._publish-tweet-panel')

            <div class="border border-gray-300 rounded-lg">
                @foreach ($tweets as $tweet)
                    @include('partial._tweet')
                @endforeach
            </div>
    </div>
@endsection
