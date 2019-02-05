@extends('layouts.app')

@section('content')
<div class="ui container">
    <div class="ui segment">
        <div class="ui two column very relaxed grid">
            <div class="column">
                <div class="ui large header ">Iscritto a:</div>
                    <h2 class="ui center aligned icon header">
                        <i class="circular calendar check outline icon"></i>
                        {{$part_events}} eventi
                    </h2>

            </div>

            <div class="column">
                <div class="ui large header">Creati da me:</div>
                <p>
                    <h2 class="ui center aligned icon header">
                      <i class="circular calendar plus outline icon"></i>
                      {{$created_events}} eventi
                    </h2>
                </p>
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
                        <div class="ui middle aligned divided list">
                            <div class="item">
                                <div class="right floated content">
                                    <div class="ui  red button">Delete</div>
                                </div>
                                <i class="calendar alternate icon"></i>

                                <div class="content">
                                    <li> <h5 class="ui header">{{ $event->title }} </h5>  {{ (new \Carbon\Carbon($event->created_at))->diffForHumans() }}</li>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="eight wide column">
                <div class="row">
                    @foreach ($owned_event as $owned)
                        <div class="ui middle aligned divided list">
                            <div class="item">
                                <div class="right floated content">
                                    <div class="ui buttons">
                                        <button class="ui green button">Update</button>
                                        <div class="or"></div>
                                        <button class="ui red  button">Delete</button>
                                    </div>
                                </div>
                                <i class="calendar alternate icon"></i>
                                <div class="content">
                                    <li> <h5 class="ui header">{{ $event->title }} </h5> {{ (new \Carbon\Carbon($event->created_at))->diffForHumans() }}</li>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
