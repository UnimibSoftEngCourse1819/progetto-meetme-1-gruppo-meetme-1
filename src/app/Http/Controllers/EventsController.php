<?php

namespace App\Http\Controllers;

use App\Event;
use App\Email;
use App\TimeSlot;
use Illuminate\Http\Request;
use App\Mail\EventInvitation;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\EventCreationRequest;

class EventsController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails = request()->user()->emails;
        return view('events.history', compact('emails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventCreationRequest $request)
    {
        $event = $this->createEvent($this->validateUserEmailAccount());

        $partecipants = collect(request()->partecipants);
        $this->fireInvitationEmails($event, $partecipants);

        $models = $this->mapModels($partecipants);

        $invited = $models->filter(function ($model) {
            return $model instanceof Email;
        });
        $unregistered = $models->filter(function ($model) {
            return ! ($model instanceof Email);
        });

        $event->partecipants()->syncWithoutDetaching($invited->pluck('id'));

        return redirect()->route('events.show', ['event' => $event])
            ->with('unregistered', $unregistered);
    }

    /**
     * Ensure the email account is associated to the user
     *
     * @return App\Email
     */
    private function validateUserEmailAccount()
    {
        return tap(Email::find(request()->account), function ($email) {
            abort_if($email->user_id != auth()->user()->id, 412, 'Invalid account');
        });
    }

    /**
     * Bulid an event associated to the user account
     *
     * @param App\Email
     * @return App\Event
     */
    private function createEvent(Email $email)
    {
        $attributes = request()->only('title', 'description', 'public');
        $attributes['public'] = (bool)$attributes['public'];

        return tap(Event::make($attributes), function ($event) use ($email) {
            $email->events()->save($event);
            $event->timeslots()->saveMany($this->buildTimeSlots());
        });
    }

    /**
     * Create the TimeSlot objects that will be
     * associated to the just event created.
     *
     * @return array
     */
    private function buildTimeSlots()
    {
        $timeslots = [];

        foreach(request()->events as $json_event) {
            $timeslot = json_decode($json_event);
            $timeslots[] = TimeSlot::make([
                'from' => $timeslot->start,
                'to' => $timeslot->end
            ]);
        }

        return $timeslots;
    }

    private function fireInvitationEmails($event, $partecipants)
    {
        return $partecipants->each(function ($email) use ($event) {
            Mail::to($email)->send(new EventInvitation(auth()->user(), $event));
        });
    }

    private function mapModels($partecipants)
    {
        return $partecipants->map(function ($partecipant) {
            return (Email::where('email', $partecipant)->first()) ?: $partecipant;
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $event->load('creator.user', 'partecipants.user');
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $this->authorized('own', $event);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\EventCreationRequest  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventCreationRequest $request, Event $event)
    {
        $this->authorized('edit', $event);

        $event->update(request(['title', 'description', 'public']));


        $timeslots = collect(request('events'))->map(function ($timeslot) use ($event) {
            $data = json_decode($timeslot);

            $conditions = [
                ['from', $data->start],
                ['to', $data->end]
            ];

            return (TimeSlot::where($conditions)->first()) ?: $timeslot;
        });

        dd($timeslots);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $this->authorize('edit', $event);

        $event->delete();

        return redirect()->route('events.index');
    }
}
