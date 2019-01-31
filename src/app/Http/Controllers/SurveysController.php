<?php

namespace App\Http\Controllers;

use App\Event;
use App\TimeSlot;
use Illuminate\Http\Request;

class SurveysController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $survey)
    {
        //dd($survey->id);
        $time_slots = $survey->timeslots;
        //$voters = $time_slots->voters;
        return view('surveys.show', compact('time_slots', "survey"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function answer(Request $request, Event $survey)
    {
        //
    }
}
