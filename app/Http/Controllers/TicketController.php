<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;
class TicketController extends Controller
{


    // Handle the creation of a new ticket (store method example)




    public function __construct()
{
}


    public function store(Request $request)
{
    $ticket = new Ticket();
    $ticket->user_id = Auth::id();
    $ticket->title = $request->title;
    $ticket->type = $request->type;
    $ticket->info = $request->info;
    $ticket->save();

    return redirect()->back()->with('success', 'Ticket submitted!');
}

public function index()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        // Fetch all tickets from the database
        $tickets = Ticket::with('comments')->where('user_id', auth::id())->get();

        // Return the view with tickets data
        return view('tickets', compact('tickets'));
    }



}
