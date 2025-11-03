<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        .form-container {max-width:480px;margin:3rem auto 0 auto;}
        .auth-title {color:#263861;font-size:2rem;text-align:center;margin-bottom:1.5rem;}
    </style>
</head>
<body>
    <div class="container form-container">
        <h2 class="auth-title">Register</h2>
        <form method="POST" action="/register">
            @csrf
            <label>Name:</label>
            <input type="text" name="name" required>
            <label>Email:</label>
            <input type="email" name="email" required>
            <label>Password:</label>
            <input type="password" name="password" required>
            <div class="form-actions" style="text-align:right;">
                <button type="submit" style="background:#263861;color:#fff;">Register</button>
            </div>
        </form>
        <div style="text-align:center;margin-top:1rem;">
            <a href="/login">Already have an account? Login</a>
        </div>
    </div>
</body>
</html>
