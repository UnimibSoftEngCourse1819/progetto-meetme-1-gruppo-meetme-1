@extends('layouts.app')

@section('content')
<div class="ui  text container">
    <div class="ui header">{{ __('My Events') }}
        <div class=" right floated ui labeled button" tabindex="0">
            <a href="{{route('events.create')}}" class= " tiny ui primary button">
               <i class=" pencil alternate icon"></i> Nuovo Evento
            </a>
        </div>
    </div>

    @foreach (request()->user()->emails as $email)
        <div class="ui segment">
            <div class="ui small header"> <i class="big envelope icon"> </i> </span> {{ $email->email }}</div>
            <div class ="ui list">
                @forelse ($email->events as $event)
                    <div class="item">
                        <div class="header">
                             <a href="{{ route('events.show', ['id' => $event->id]) }}">
                                 {{ $event->title }}
                                 @if ($event->public)
                                     <span class="ui mini blue label">Public</span>
                                 @else
                                     <span class="ui mini orange label">Private</span>
                                 @endif
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
