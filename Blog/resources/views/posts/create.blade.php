<!DOCTYPE html>
<html>
<head>
    <title>Add a New Post</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    @include('components.navbar')
    <div class="container">
        <a href="/posts" class="back-link">
            <!-- SVG ICON -->
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
                    <svg width="17" height="17" viewBox="0 0 20 20" fill="none"><path d="M2 14.5V18h3.5L17.8 5.7a1 1 0 0 0 0-1.4l-2.1-2.1a1 1 0 0 0-1.4 0L2 14.5z" fill="#13aa52"/></svg>
                    Create
                </button>
            </div>
        </form>
    </div>
</body>
</html>
