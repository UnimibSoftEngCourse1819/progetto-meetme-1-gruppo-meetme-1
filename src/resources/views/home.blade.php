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
                <div class="ui divider"></div>

                <div class="row">
                    <div class="ui middle celled relaxed aligned divided list">
                        @foreach ($events as $event)
                        <div class="item">
                            @can('edit', $event)
                            <form class="right floated" method="POST" action="{{route('events.destroy', ['event' => $owned->id])}}">
                                @method('delete')
                                @csrf
                                <button class="ui red button" type="submit">Delete</button>
                            </form>
                            @endcan
                            <i class="calendar alternate icon"></i>

                            <div class="content">
                                <li> <h5 class="ui header">{{ $event->title }} </h5>  {{ (new \Carbon\Carbon($event->created_at))->diffForHumans() }}</li>
                            </div>
                        </div>
                    @endforeach
                    </div>

                </div>

            </div>

            <div class="column">
                <div class="ui large header">Creati da me:</div>

                <p>
                    <h2 class="ui center aligned icon header">
                      <i class="circular calendar plus outline icon"></i>
                      {{$created_events}} eventi
                    </h2>
                <div class="ui divider"></div>
                <div class="row">
                    <div class="ui middle celled relaxed aligned divided list">

                    @foreach ($owned_events as $owned)
                        <div class="item">
                            <div class="right floated content">
                                <div class="ui buttons">
                                    <a href="{{route('events.edit', ['event' => $owned->id])}}" class="ui green button">Update</a>
                                    <div class="or"></div>
                                    <form class="right floated" method="POST" action="{{route('events.destroy', ['event' => $owned->id])}}">
                                        @method('delete')
                                        @csrf
                                        <button class="ui red button" type="submit">Delete</button>
                                    </form>

                                </div>
                            </div>
                            <i class="calendar alternate icon"></i>
                            <div class="content">
                                <li> <h5 class="ui header">{{ $owned->title }} </h5> {{ (new \Carbon\Carbon($owned->created_at))->diffForHumans() }}</li>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
                </p>
                <a class="ui blue button" href="{{route('events.create')}}">Crea nuovo evento</a>
            </div>
        </div>
        <div class="ui vertical divider"> 0 </div>
    </div>
</div>
@endsection
