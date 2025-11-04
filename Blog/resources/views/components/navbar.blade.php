<div class="navbar">
    <div class="navbar-links">
        <a href="/posts">All Posts</a>
        <a href="/posts/create">Create Post</a>
    </div>
    @if(session('user_id'))
    <form method="POST" action="/logout" style="margin:0;">
        @csrf
        <button type="submit" class="logout-btn">Logout</button>
    </form>
    @endif
</div>
