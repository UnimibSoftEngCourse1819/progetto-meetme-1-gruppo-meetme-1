@extends('layouts.app')

@section('content')
<div class="ui text container segment padded">
    <div class="ui header">
        Event: {{ $event->title }} @if (! $event->public)(Private)@endif
        <div class="sub header">{{ $event->created_at->diffForHumans() }}</div>
    </div>
    <div><b>Description:</b> {{ $event->description }}</div>

    @if ($event->from)
        <div><b>From:</b> {{ $event->from->format('H:i \o\n d M Y') }}</div>
    @else
        <div><b>To:</b> Da definire</div>
    @endif

    @if ($event->to)
        <div><b>To:</b> {{ $event->to->format('H:i \o\n d M Y') }}</div>
    @else
        <div><b>To:</b> Da definire</div>
    @endif

    <div><b>Creator:</b> {{ $event->creator->user->first_name }} {{ $event->creator->user->last_name }} ({{ $event->creator->user->username }})</div>

    <div><b>Invitati ({{ $event->partecipants()->count() }}): </b><div>
    <div class="ui celled relaxed list">
        @foreach ($event->partecipants as $partecipant)
            <div class="item">

                <div class="header">{{ $partecipant->user->first_name }} {{ $partecipant->user->last_name }}</div>
                <div class="description"><span class="ui blue tiny label">Email</span> {{ $partecipant->email }}</div>
            </div>
        @endforeach
    </div>
</div>
@endsection
