@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>All Tweets</h1>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.tweets.create') }}" style="margin-bottom: 20px; display: inline-block; background: #28a745; color: white; padding: 8px 12px; border-radius: 5px; text-decoration: none;">
        + Create New Tweet
    </a>

    <table style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr style="background: #f8f9fa;">
                <th style="padding: 10px; border: 1px solid #ddd;">ID</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Body</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Author</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Created</th>
                <th style="padding: 10px; border: 1px solid #ddd;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tweets as $tweet)
                <tr>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $tweet->id }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ Str::limit($tweet->body, 50) }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $tweet->user->name ?? 'Unknown' }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">{{ $tweet->created_at->format('d M Y') }}</td>
                    <td style="padding: 10px; border: 1px solid #ddd;">
                        <a href="{{ route('admin.tweets.show', $tweet) }}" style="color: #007bff; margin-right: 5px;">View</a>
                        <a href="{{ route('admin.tweets.edit', $tweet) }}" style="color: #ffc107; margin-right: 5px;">Edit</a>
                        <form action="{{ route('admin.tweets.destroy', $tweet) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: #dc3545; background: none; border: none; cursor: pointer;" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="padding: 10px; border: 1px solid #ddd; text-align: center;">
                        No tweets found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
