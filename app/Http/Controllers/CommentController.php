<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CommentController extends Controller
{
    // Show the comments page for a specific ticket
    public function show($id)
    {
        // Fetch the ticket
        $ticket = Ticket::findOrFail($id);

        // Get the comments related to the ticket
        $comments = Comment::where('ticket_id', $id)->with('user')->get();

        // Return the view with ticket and comments data
        return view('comments', compact('ticket', 'comments'));
    }

    // Handle storing a new comment in the database
    public function store(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        // Create the new comment
        Comment::create([
            'ticket_id' => $id,
            'user_id' => Auth::id(),
            'content' => $request->input('content'),  // Access 'content' using $request->input()
        ]);

        // Redirect back to the comments page with success message
        return redirect()->route('comments', $id)->with('success', 'Comment added!');
}
}
