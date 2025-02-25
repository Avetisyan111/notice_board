<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
    </head>
    <body>
    <div align="center">
        <h1>Sign up</h1>
        <form action="{{ route('signup') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label>First Name</label>
            <div>
                <input type="text" name="firstName" placeholder="First name" required><br>
            </div>
            <label>Last Name</label>
            <div>
                <input type="text" name="lastName" placeholder="Last name" required><br>
            </div>
            <label>Email</label>
            <div >
                <input type="email" name="email" placeholder="Email" required><br>
            </div>
            <label>Password</label>
            <div>
                <input type="password" name="password" placeholder="Password" required><br>
            </div>
            <div>
                <button type="submit" >Sign up</button>
            </div>
        </form>
        <div >
            <a href="{{ route('login') }}" >Log in</a>
        </div>
    </div>
    </body>
</html>
