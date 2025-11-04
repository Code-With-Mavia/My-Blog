<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('components.navbar')
    <div class="container">
        <a href="/posts" class="back-link">
            <!-- SVG ICON -->
            Back to Posts
        </a>
        <h1>Blog Posts</h1>
        <ul>
        @foreach($posts as $post)
            <li>
                <div class="content-row">
                    <div class="card-details">
                        <strong>{{ $post->title }}</strong><br>
                        <span>{{ $post->body }}</span>
                    </div>
                    <div class="card-actions">
                        <a href="/posts/{{ $post->id }}/edit" class="edit-btn" title="Edit post">
                            <svg width="17" height="17" viewBox="0 0 20 20" fill="none"><path d="M2 14.5V18h3.5L17.8 5.7a1 1 0 0 0 0-1.4l-2.1-2.1a1 1 0 0 0-1.4 0L2 14.5z" fill="#13aa52"/></svg>
                            Edit
                        </a>
                        <form class="inline-action" action="/posts/{{ $post->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" title="Delete post" onclick="return confirm('Delete this post?')">
                                <svg width="17" height="17" viewBox="0 0 20 20" fill="none"><path d="M7 18a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V6H7v12zm9-14h-3.5l-1-1h-5l-1 1H2v2h16V4z" fill="#e04d2f"/></svg>
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
        </ul>
    </div>
</body>
</html>
