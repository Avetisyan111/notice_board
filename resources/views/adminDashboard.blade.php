<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div align="center">
        <div style="position: absolute; top: 20px; right: 20px; z-index: 10;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-danger">
                    Log out
                </button>
            </form>
        </div>

        <p class="text-h1" style="margin-top: 15px;">Create Story</p>

        <form action="{{ route('story.create') }}" method="POST">
            @csrf
            <p style="margin-top: 20px;" class="text-h3">Title</p>
            <div style="margin-top: 10px;">
                <input type="text" name="title" placeholder="Title" class="input" required>
            </div>
            <p style="margin-top: 10px;" class="text-h3">Description</p>
            <div style="margin-top: 10px;">
                <textarea name="description" placeholder="Description" class="input-textarea" required></textarea>
            </div>
            <div style="margin-top: 20px;">
                <button type="submit" class="btn-primary">Create Event</button>
            </div>
        </form>

        <div>
            <form action="{{ route('dashboard') }}" method="GET">
                @csrf
                <button type="submit" class="btn-primary">
                    User dashboard
                </button>
            </form>
        </div>

    </div>
</body>
</html>
