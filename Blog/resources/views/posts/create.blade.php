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
    </div>
    <div class="container">
        <a href="/posts" class="back-link">
            <svg width="20" height="20" fill="none" style="margin-right:7px;vertical-align:middle;"><circle cx="10" cy="10" r="9" stroke="#2d72fa" stroke-width="2"/><path d="M9 7l-3 3 3 3M6 10h7" stroke="#2d72fa" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
            Back to Posts
        </a>
        <h1>Add a New Post</h1>
        <form method="POST" action="/posts">
            @csrf
            <label>User ID:</label>
            <input type="number" name="user_id" required>
            <label>Title:</label>
            <input type="text" name="title" required>
            <label>Body:</label>
            <textarea name="body" required></textarea>
            <div class="form-actions">
                <button type="submit" class="edit-btn">
                    <svg width="16" height="16" fill="none" style="margin-right:5px;vertical-align:middle;" viewBox="0 0 20 20"><path d="M2 14.5V18h3.5L17.8 5.7a1 1 0 0 0 0-1.4l-2.1-2.1a1 1 0 0 0-1.4 0L2 14.5z" fill="#23c546"/></svg>
                    Create
                </button>
            </div>
        </form>
    </div>
</body>
</html>
