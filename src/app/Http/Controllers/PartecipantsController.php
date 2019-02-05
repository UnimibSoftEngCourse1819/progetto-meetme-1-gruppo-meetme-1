<?php

namespace App\Http\Controllers;

use App\Event;
use App\Email;
use Illuminate\Http\Request;

class PartecipantsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroy(Event $event, Email $email)
    {
        $this->authorize('own', $email);
        $this->authorize('view', $event);

        $event->partecipants()->detach($email->id);

        return redirect()->route('events.show', ['event' => $event->id]);
    }
}
