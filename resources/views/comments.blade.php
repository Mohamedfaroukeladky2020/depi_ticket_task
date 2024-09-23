<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Comments</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Comments for Ticket: {{ $ticket->title }}</h1>

    <!-- Display Ticket Information -->
    <p><strong>Ticket Info:</strong> {{ $ticket->info }}</p>

    <!-- Display All Comments -->
    <h3>Comments</h3>
    <ul class="list-group mb-4">
        @forelse ($comments as $comment)
            <li class="list-group-item">
                <strong>User {{ $comment->user->name }}:</strong> {{ $comment->content }}
                <br><small>Posted on {{ $comment->created_at->format('d-m-Y H:i') }}</small>
            </li>
        @empty
            <li class="list-group-item">No comments yet.</li>
        @endforelse
    </ul>

    <!-- Comment Form -->
    <h4>Add a Comment</h4>
    <form action="{{ route('comments', $ticket->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="content" class="form-label">Your Comment</label>
            <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Comment</button>
    </form>
</div>
</body>
</html>
