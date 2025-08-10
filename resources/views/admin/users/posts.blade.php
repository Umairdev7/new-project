@extends('layouts.admin')

@section('content')
    <h1>All Posts</h1>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        @forelse($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->user->name ?? 'Unknown' }}</td>
                <td>{{ $post->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('posts.show', $post) }}">View</a> |
                    <a href="{{ route('posts.edit', $post) }}">Edit</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">No posts found</td>
            </tr>
        @endforelse
    </table>
@endsection
