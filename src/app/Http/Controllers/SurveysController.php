<?php

namespace App\Http\Controllers;

use App\Event;
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
        //risalgo alle email partecipanti utente loggato
    }
}
