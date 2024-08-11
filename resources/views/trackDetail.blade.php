<!DOCTYPE html>
<html>
<head>
    <title>Track Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Track Detail
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $track->id }}</p>
                <p><strong>Title:</strong> {{ $track->title }}</p>
                <a href="{{ url('/tracks') }}" class="btn btn-secondary">Back to Tracks</a>
            </div>
        </div>
    </div>
</body>
</html>
