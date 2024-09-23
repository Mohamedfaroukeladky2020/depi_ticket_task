@extends('layouts')

@section('content')
<div class="container">
    <h2 class="my-4">Notifications</h2>

    <!-- Display Notifications -->
    @if($notifications->isEmpty())
        <div class="alert alert-info">No notifications available.</div>
    @else
        <div class="list-group">
            @foreach($notifications as $notification)
                <div class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <p class="mb-1">{{ $notification->message }}</p>
                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
