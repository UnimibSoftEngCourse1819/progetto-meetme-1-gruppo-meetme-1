<?php

namespace App\Http\Controllers;

use App\Email;
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
        $part_events = auth()->user()->emails->reduce(function ($carry, $email) {
            return $carry + $email->partecipate()->count();
        });
        $created_events = auth()->user()->emails->reduce(function ($carry, $email) {
            return $carry + $email->events()->count();
        });


        /*$count_events = DB::table('emails')
                    ->join('email_event', "emails.id", '=', 'email_event.event_id')
                    ->groupBy('emails.user_id')
                    ->count();*/
        //dd($count_events);

        return view('home', compact('part_events','created_events'));
    }
}
