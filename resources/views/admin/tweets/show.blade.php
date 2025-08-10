@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Tweet #{{ $tweet->id }}</h1>

    <p><strong>Author:</strong> {{ $tweet->user->name ?? 'Unknown' }}</p>
    <p><strong>Created:</strong> {{ $tweet->created_at->format('d M Y H:i') }}</p>

    <div><h2>{{ $tweet->title }}</h2></div>
    <div style="margin-top: 20px; font-size: 1.1em;">
        {!! nl2br(e($tweet->body)) !!}
    </div>

    <div style="margin-top: 20px;">
        <a href="{{ route('admin.tweets.edit', $tweet) }}" class="btn btn-primary" style="margin-right:10px;">Edit</a>

        <form action="{{ route('admin.tweets.destroy', $tweet) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this tweet?')">
                Delete
            </button>
        </form>

        <a href="{{ route('admin.tweets.index') }}" class="btn btn-secondary" style="margin-left: 15px;">Back to All Tweets</a>
    </div>
</div>
@endsection
