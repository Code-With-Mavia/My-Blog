<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="navbar">
        <a href="/posts">All Posts</a>
        <a href="/posts/create">Create Post</a>
    </div>
    <div class="container">
        <a href="/posts" class="back-link">
            <svg width="20" height="20" fill="none" style="margin-right:7px;vertical-align:middle;"><circle cx="10" cy="10" r="9" stroke="#2d72fa" stroke-width="2"/><path d="M9 7l-3 3 3 3M6 10h7" stroke="#2d72fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
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
                            <svg width="17" height="17" fill="none" style="margin-right:5px;vertical-align:middle;" viewBox="0 0 20 20"><path d="M2 14.5V18h3.5L17.8 5.7a1 1 0 0 0 0-1.4l-2.1-2.1a1 1 0 0 0-1.4 0L2 14.5z" fill="#23c546"/></svg>
                            Edit
                        </a>
                        <form class="inline-action" action="/posts/{{ $post->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" title="Delete post" onclick="return confirm('Delete this post?')">
                                <svg width="16" height="16" fill="none" style="margin-right:5px;vertical-align:middle;" viewBox="0 0 20 20"><path d="M7 18a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V6H7v12zm9-14h-3.5l-1-1h-5l-1 1H2v2h16V4z" fill="#e74c3c"/></svg>
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
