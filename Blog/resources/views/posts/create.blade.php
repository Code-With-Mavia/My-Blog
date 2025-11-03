<!DOCTYPE html>
<html>
<head>
    <title>Create Post</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
<div class="navbar">
    <a href="/posts">All Posts</a>
    <a href="/posts/create">Create Post</a>
</div>
<h1>Add a New Post</h1>
<form method="POST" action="/posts">
    @csrf
    <label>User ID:</label>
    <input type="number" name="user_id" required>
    <label>Title:</label>
    <input type="text" name="title" required>
    <label>Body:</label>
    <textarea name="body" required></textarea>
    <button type="submit">Create</button>
</form>
<a href="/posts">Back to Posts</a>
</body>
</html>
