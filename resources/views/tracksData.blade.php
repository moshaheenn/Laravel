<!DOCTYPE html>
<html>
<head>
    <title>Tracks List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Tracks List
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tracks as $track)
                            <tr>
                                <td>{{ $track->id }}</td>
                                <td>{{ $track->title }}</td>
                                <td>
                                    <a href="{{ url('/tracks/' . $track->id) }}" class="btn btn-primary">View</a>
                                    <form action="{{ url('/tracks/' . $track->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- <a href="{{ url('/tracks/create') }}" class="btn btn-success">Add New Track</a> -->
            </div>
        </div>
    </div>
</body>
</html>
