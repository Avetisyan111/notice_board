<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
    <div align="center">
        <h1>Login</h1>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <label>Email</label>
            <div>
                <input type="email" name="email" placeholder="Email" required><br>
            </div>
            <label>Password</label>
            <div>
                <input type="password" name="password" placeholder="Password" required><br>
            </div>
            <div>
                <button type="submit">Login</button>
            </div>
        </form>
        <div>
            <h3>Sign up Here </h3>
            <a href="{{ route('signup') }}">Sign up</a>
        </div>
    </div>
    </body>
</html>
