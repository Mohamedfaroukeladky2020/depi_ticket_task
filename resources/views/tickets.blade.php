


@extends('layouts')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2 class="my-4">Submit a Ticket</h2>

        <!-- Ticket Submission Form -->
        <form method="POST" action="{{ url('/tickets') }}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Ticket Title</label>
                <input type="text" class="form-control" id="title" name="title" required>

            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type">
                    <option value="request">Request</option>
                    <option value="problem">Problem</option>
                </select>
            </div>


            <div class="mb-3">
                <label for="info" class="form-label">Details</label>
                <textarea class="form-control" id="info" name="info" rows="3" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit Ticket</button>
        </form>

        <hr class="my-5">

        <!-- Display Submitted Tickets -->
        <h2 class="my-4">Your Tickets</h2>
        @foreach($tickets as $ticket)
            <div class="card mb-3">
                <div class="card-header">
                    {{ $ticket->title }} ({{ $ticket->type }})
                </div>
                <div class="card-body">
                    <p>{{ $ticket->info }}</p>
                    <h6>Comments:</h6>
                    @foreach($ticket->comments as $comment)
                        <div class="mb-2">
                            <strong>{{ $comment->user->name }}:</strong> {{ $comment->content }}
                        </div>
                    @endforeach

                    <!-- Comment Form -->
                    <form method="POST" action="{{ url('/ticket/comments',$ticket->id) }}">
                        @csrf
                        <div class="mb-3">
                            <textarea class="form-control" name="content" rows="2" placeholder="Add a comment..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-secondary btn-sm">Submit Comment</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

   

</body>
</html>




@endsection
