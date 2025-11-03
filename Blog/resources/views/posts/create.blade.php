<!DOCTYPE html>
<html>
<head>
    <title>Add a New Post</title>
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
        <h1>Add a New Post</h1>
        <form method="POST" action="/posts">
            @csrf
            <label>Title:</label>
            <input type="text" name="title" required>
            <label>Body:</label>
            <textarea name="body" required></textarea>
            <div class="form-actions">
                <button type="submit" class="edit-btn">
                    <!-- SVG omitted for brevity -->
                    Create
                </button>
            </div>
        </form>
    </div>
</body>
</html>
