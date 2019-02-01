@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="ui segment">
        <div class="ui two column very relaxed grid">
            <div class="column">
                <h2 class="ui center aligned icon header">
                    <i class="circular calendar check outline icon"></i>
                    {{$part_events}} eventi in programma
                </h2>

            </div>

            <div class="column">
                <h2 class="ui center aligned icon header">
                    <i class="circular calendar plus outline icon"></i>
                    {{$created_events}} eventi in programma
                </h2>
            </div>
        </div>
        <div class="ui vertical divider">
        O
        </div>
    </div>
    <div class="ui internally celled grid">
        <div class="row">
            <div class="eight wide column">
                <div class="row">
                    @foreach ($events as $event)
                        <li>{{ $event->title }} {{ (new \Carbon\Carbon($event->created_at))->diffForHumans() }}</li>
                    @endforeach
                </div>
            </div>
            <div class="eight wide column">
                <div class="row">
                    @foreach ($owned_event as $owned)
                            <li>{{ $owned->title }} {{ (new \Carbon\Carbon($owned->created_at))->diffForHumans() }}</li>
                        @endforeach
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
