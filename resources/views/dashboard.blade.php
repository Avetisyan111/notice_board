<!DOCTYPE html>
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

            <div id="stories" class="mt-3">
                <table class="table-style" style="margin-top: 10px;" id="stories-table">
                    <p class="text-h1" style="margin-top: 20px;">All Events</p>

                    <tr style="border: 1px solid black; padding: 10px;">
                        <th style="border: 1px solid black; padding: 10px;">Title</th>
                        <th style="border: 1px solid black; padding: 10px;">Description</th>
                    </tr>
                    @foreach ($stories as $story)
                        <tr style="border: 1px solid black; padding: 10px;">
                            <td style="border: 1px solid black; padding: 10px;">{{ $story['title'] }}</td>
                            <td style="border: 1px solid black; padding: 10px;">{{ $story['description'] }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div style="margin-top: 20px;">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <form action="{{ route('admin.dashboard') }}" method="GET">
                        @csrf
                            <button type="submit" class="btn-primary">
                                Admin Page
                            </button>
                        </form>
                    @endif
                @endauth
            </div>

            <script type="module">
                Echo.channel('story')
                    .listen('.App\\Event\\NewStoryCreated', (event) => {
                        const {story} = event;

                        let newRow = document.createElement('tr');
                        newRow.setAttribute("id", `id-${story.id}`);

                        newRow.innerHTML = `
                            <td style="border: 1px solid black; padding: 10px;">${story.title}</td>
                            <td style="border: 1px solid black; padding: 10px;">${story.description}</td>
                        `;
                        document.querySelector("#stories-table").appendChild(newRow);
                    });

            </script>

        </div>
    </body>
</html>
