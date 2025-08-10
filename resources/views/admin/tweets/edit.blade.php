@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Tweet #{{ $tweet->id }}</h1>

    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            <strong>Whoops! There were some problems with your input:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.tweets.update', $tweet) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label for="title" style="display: block; font-weight: bold;">Title</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title', $tweet->title) }}"
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
                required
            >
        </div>

        <div style="margin-bottom: 15px;">
            <label for="body" style="display: block; font-weight: bold;">Body</label>
            <textarea
                id="body"
                name="body"
                rows="6"
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"
                required
            >{{ old('body', $tweet->body) }}</textarea>
        </div>

        <button type="submit"
                style="background: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">
            Update Tweet
        </button>

        <a href="{{ route('admin.tweets.index') }}"
           style="margin-left: 15px; color: #6c757d; text-decoration: none;">
            Cancel
        </a>
    </form>
</div>
@endsection
