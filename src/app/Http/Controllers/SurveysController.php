<?php

namespace App\Http\Controllers;

use App\Event;
use App\Email;
use App\TimeSlot;
use Illuminate\Http\Request;

class SurveysController extends Controller
{

        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $survey)
    {
        $this->authorize('view', $survey);
        //risalgo alle email partecipanti utente loggato

        $time_slots = $survey->timeslots;
        $partecipants = $survey->partecipants;
        $auth_partecipants = $partecipants->where('id',auth()->user());

        //$voters = $time_slots->pluck('voters')->flatten();//si ritornano gli utenti che sono iscritti all evento
        $survey->load('timeslots.voters');
        return view('surveys.show', compact('time_slots', "survey", 'partecipants','auth_partecipants'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function answer(Request $request, Event $survey)
    {
        $this->validate($request, [
            'email_id' => ['required', 'exists:emails,id'],
            'time_slot_id' => ['required', 'exists:time_slots,id']
        ]);

        $email = Email::find(request()->email_id);
        $this->authorize('own', $email);
        $this->authorize('view', $survey);

        $email->timeslots()->attach($request->time_slot_id);

        return redirect()->back()->with('message', 'Vote successful');
    }

    /**
     * Ensure the email account is associated as partecipant
     *
     * @return App\Email
     */
    private function ensureEmailCanPartecipate(Email $email, Event $survey)
    {
        abort_if($survey->partecipants()->where('emails.id', $email->id)->count()== 0, 404);
    }
}
