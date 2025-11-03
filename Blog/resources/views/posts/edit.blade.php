<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>
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
        <h1>Edit Post</h1>
        <form method="POST" action="/posts/{{ $post->id }}">
            @csrf
            @method('PUT')
            <label>Title:</label>
            <input type="text" name="title" value="{{ $post->title }}" required>
            <label>Body:</label>
            <textarea name="body" required>{{ $post->body }}</textarea>
            <div class="form-actions">
                <button type="submit" class="edit-btn">
                    <!-- SVG omitted for brevity -->
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>
