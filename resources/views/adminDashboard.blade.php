<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <div align="center">
            <div style="position: absolute; top: 20px; right: 20px; z-index: 10;">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">
                        Log out
                    </button>
                </form>
            </div>

            <h2>Create Story</h2>
            <div>
                <form action="{{ route('story.create') }}" method="POST">
                    @csrf
                    <label>Title</label>
                    <div>
                        <input type="text" name="title" placeholder="Title">
                    </div>
                    <label>Description</label>
                    <div>
                        <input type="text" name="description" placeholder="Description">
                    </div>
                    <div>
                        <button type="submit">Add Story</button>
                    </div>
                </form>
            </div>

        </div>
    </body>
</html>
