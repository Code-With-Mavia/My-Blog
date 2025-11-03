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
        <form method="POST" action="/logout" style="display:inline; margin-left:auto;">
            @csrf
            <button type="submit" class="logout-btn" style="background:none;color:#e74c3c;font-weight:600;border:none;cursor:pointer;">Logout</button>
        </form>
    </div>
    <div class="container">
        <a href="/posts" class="back-link">
            <!-- SVG omitted for brevity -->
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
                            <!-- SVG omitted for brevity -->
                            Edit
                        </a>
                        <form class="inline-action" action="/posts/{{ $post->id }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn" title="Delete post" onclick="return confirm('Delete this post?')">
                                <!-- SVG omitted for brevity -->
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
