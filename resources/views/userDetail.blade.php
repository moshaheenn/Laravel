<!DOCTYPE html>
<html>
<head>
    <title>User Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                User Detail
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $user['id'] }}</p>
                <p><strong>Name:</strong> {{ $user['name'] }}</p>
                <p><strong>Age:</strong> {{ $user['age'] }}</p>
                <a href="{{ url('/users') }}" class="btn btn-secondary">Back to Users</a>
            </div>
        </div>
    </div>
</body>
</html> 