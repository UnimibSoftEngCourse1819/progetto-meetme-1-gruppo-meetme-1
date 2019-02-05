<?php

namespace App\Http\Controllers;

use App\Event;
use App\Email;
use Illuminate\Http\Request;

class PartecipantsController extends Controller
{
    /**
     * Create a new controller instance
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Remove a partecipant from the event
     *
     * @return Illuminate\Http\Response
     */
    public function destroy(Event $event, Email $email)
    {
        $this->authorize('own', $email);
        $this->authorize('edit', $event);

        $event->partecipants()->detach($email->id);

        return redirect()->route('events.show', ['event'=>$event->id]);
    }
}
