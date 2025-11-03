<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="navbar">
    <a href="/posts">All Posts</a>
    <a href="/posts/create">Create Post</a>
</div>
<h1>Blog Posts</h1>
<ul>
@foreach($posts as $post)
    <li>
        <div class="content-card">
            <strong>{{ $post->title }}</strong><br>
            {{ $post->body }} <br>
            <a href="/posts/{{ $post->id }}/edit">Edit</a>
            <form action="/posts/{{ $post->id }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Delete this post?')">Delete</button>
            </form>
        </div>
    </li>
@endforeach
</ul>
</body>
</html>
