@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Events') }}</div>

                <div class="card-body">
                    <h2>Event: {{ $event->title }} @if (! $event->public)(Private)@endif</h2>
                    <p><small>{{ $event->created_at->diffForHumans() }}</small></p>
                    <p>Description: {{ $event->description }}</p>
                    <p>From: {{ $event->from }}</p>
                    <p>To: {{ $event->to }}</p>
                    <p>Creator: {{ $event->creator->user }}</p>
                    <p>Invited ({{ $event->partecipants()->count() }}):<p>
                    <ul>
                        @foreach ($event->partecipants as $partecipant)
                        <li>{{ $partecipant->user->first_name }} &lt;{{ $partecipant->email }}&gt;</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
