<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Track</title>
    <!-- Bootstrap CSS (optional) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Track</h1>
        <form action="{{ route('tracks.update', $track->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Track Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $track->name }}" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Track Image:</label>
                <input type="file" name="image" id="image" class="form-control">
                <small>Leave blank to keep current image</small>
            </div>
            <button type="submit" class="btn btn-primary">Update Track</button>
        </form>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
