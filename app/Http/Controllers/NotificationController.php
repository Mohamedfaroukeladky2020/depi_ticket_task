<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function send(Request $request)
{
    $notification = new Notification();
    $notification->user_id = $request->user_id;
    $notification->message = $request->message;
    $notification->save();

    return redirect()->back()->with('success', 'Notification sent!');
}

// Display a list of notifications
// Display a list of notifications for the logged-in user

public function index()
    {
        // Fetch notifications for the currently authenticated user
        $notifications = Notification::where('user_id', Auth::id())->get();

        // Return the view with notifications data
        return view('notifications', compact('notifications'));
    }

}
