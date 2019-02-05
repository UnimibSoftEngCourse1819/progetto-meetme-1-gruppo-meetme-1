@extends('layouts.app')

@section('content')
<div class="ui  text container">
    <div class="ui header">{{ __('My Events') }}
            <a href="{{route('events.create')}}" class= " right floatedtiny ui primary button">
               <i class=" pencil alternate icon"></i>
               Nuovo Evento
            </a>
    </div>

    @foreach (request()->user()->emails as $email)
        <div class="ui segment">
            <div class="ui small header"> <i class="big envelope icon"> </i>  {{ $email->email }}</div>
            <div class ="ui celled very relaxed list">
                @forelse ($email->events as $event)
                    <div class="item">
                        <div class="header">
                            <i class="calendar alternate outline icon"></i>

                            <a class="floated content" href="{{ route('events.show', ['id' => $event->id]) }}">
                                <h5 class="ui header">
                                    {{ $event->title }}
                                    @if ($event->public)
                                        <span class="circular ui mini blue label">Public</span>
                                    @else
                                        <span class="circular ui mini orange label">Private</span>
                                    @endif
                                </h5>
                            </a>
                        </div>
                        {{ $event->created_at->diffForHumans() }}
                    </div>
                @empty
                    <p>No events.</p>
                @endforelse
            </div>
        </div>
    @endforeach
</div>
@endsection
