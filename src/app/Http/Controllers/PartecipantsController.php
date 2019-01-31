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
        // Verifica che il partecipante sia realmente invitato
        abort_if($event->partecipants()->where('email_id', $email->id)->count() == 0, 412);
        // Verifica che chi compie l' azione sia il proprietario dell'evento
        abort_if($event->creator->user->id !== auth()->user()->id, 412);
        // Scollega l email dai partecipanti
        $event->partecipants()->detach($email->id);
        return redirect()->route('events.show', ['event'=>$event->id]);
    }
}
