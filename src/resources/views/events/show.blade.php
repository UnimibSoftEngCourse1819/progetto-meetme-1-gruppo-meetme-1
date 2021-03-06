@extends('layouts.app')

@section('content')
<div class="ui text container segment padded">
    @if (isset($error))
        <div class="ui error message">
            <li>{{ $error }}</li>
        </div>
    @endif

    @if (session('unregistered') && session('unregistered')->isNotEmpty())
        <div class="ui error message">
            <div class="header">
                There were some errors inviting some partecipants
            </div>
            <p>Some partecipants cannot be invited to this event. They need to register on the website first.</p>
            <p>Here's a list of uninvited partecipants:</p>
            <ul class="list">
                @foreach (session('unregistered') as $person)
                    <li>{{ $person }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="ui header">
        Event: {{ $event->title }} @if (! $event->public)<i class="lock icon" title="(Private)"></i>@endif

        @if($event->creator->user->id == Auth::user()->id)
            <form name="delete-event-form" style="display:none" method="POST" action="{{route('events.destroy', ['event' => $event->id])}}">@csrf @method('delete')</form>
            <div class="ui buttons tiny right floated" tabindex="0">
                <a href="{{ route('surveys.show', [ 'event' => $event->id ]) }}" class="ui teal button">Vota</a>
                <a href="{{ route('events.edit', ['event' => $event->id]) }}" class="ui green button">Modifica</a>
                <button class="ui red button" onclick="document.forms['delete-event-form'].submit()">Elimina</button>
            </div>
        @endif
        <div class="sub header">{{ $event->created_at->diffForHumans() }}</div>
    </div>
    <div ><b><a class="ui black basic horizontal label">Description:</a></b> {{ $event->description }}</div>

    @if ($event->from)
        <div><b><a class="ui black basic horizontal label">From:</a></b> {{ $event->from->format('H:i \o\n d M Y') }}</div>
    @else
        <div><b><a class="ui black basic horizontal label">To:</a></b> Da definire</div>
    @endif

    @if ($event->to)
        <div><b><a class="ui black basic horizontal label">To:</a></b> {{ $event->to->format('H:i \o\n d M Y') }}</div>
    @else
        <div><b><a class="ui black basic horizontal label">To:</a></b> Da definire</div>
    @endif

    <div><b><a class="ui black basic horizontal label">Creator:</a></b> {{ $event->creator->user->first_name }} {{ $event->creator->user->last_name }} ({{ $event->creator->user->username }})</div>

    <div><b>
            <div class="ui blacklabel">
                <a class="ui black basic horizontal label">Invitati:</a {{ $event->partecipants()->count() }}
            </div> </b><div>
    <div class="ui celled relaxed list">
        @foreach ($event->partecipants as $partecipant)
            <div class="item">

                <div class="header">{{ $partecipant->user->first_name }} {{ $partecipant->user->last_name }}</div>
                <div class="description"><i class="small blue envelope icon"> </i>  {{ $partecipant->email }}</div>
                @if($event->creator->user->id == Auth::user()->id)
                    <div class=" right floated ui labeled button" tabindex="0">
                        <form class="right floated" method="POST" action="{{route('events.partecipants.delete', ['event' => $event->id, 'email'=>$partecipant->id] )}}">
                            @method('delete')
                            @csrf
                            <button class="icon circular mini compact eraser ui red button" type="submit"><i class="close icon"> </i> </span></button>
                        </form>
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection
