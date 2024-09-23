<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['ticket_id', 'user_id', 'content'];

    // Relationship to the Ticket model
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    // Relationship to the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
