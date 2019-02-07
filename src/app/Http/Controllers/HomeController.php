<?php

namespace App\Http\Controllers;

use App\Email;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        /*$count_events = Email::groupBy('user_id')->count();
        $count_events = auth()->user()->emails->each()->('emails.partecipate');*/
        auth()->user()->load('emails');

        $part_events = auth()->user()->emails->reduce(function ($carry, $email) {
            return $carry + $email->partecipate()->count();
        });
        $created_events = auth()->user()->emails->reduce(function ($carry, $email) {
            return $carry + $email->events()->count();
        });

        $events = DB::table('events')
            ->join('email_event', 'events.id', '=', 'email_event.event_id')
            ->join('emails', 'emails.id', '=', 'email_event.email_id')
            ->whereIn('email_event.email_id', auth()->user()->emails->pluck('id'))
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();

        $owned_events = Event::whereIn('creator_id', auth()->user()->emails->pluck('id'))
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->get();

        return view('home', compact('part_events','created_events', 'events', 'owned_events'));
    }
}
