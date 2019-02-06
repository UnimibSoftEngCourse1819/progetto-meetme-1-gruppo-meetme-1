@extends('layouts.app')

@section('content')
<div class="ui  text container">
    <div class="ui header">{{ __('My Events') }}
            <a href="{{route('events.create')}}" class= " right floatedtiny ui primary button">
               <i class=" pencil alternate icon"></i>
               Nuovo Evento
            </a>
    </div>

    <div class="ui top attached tabular menu" id="emails">
        @foreach (request()->user()->emails as $email)
            <a class="@if ($loop->index == 0) active @endif item" data-tab="tab-{{ $loop->index }}">
                {{ $email->email }}
            </a>
        @endforeach
    </div>
    @foreach (request()->user()->emails as $email)
        <div class="ui bottom relaxed attached segment @if ($loop->index == 0) active @endif tab" data-tab="tab-{{ $loop->index }}">
            @forelse ($email->events as $event)
                <div class="item event">
                    <div class="header">
                        <a class="floated content" href="{{ route('events.show', ['id' => $event->id]) }}">

                            <h5 class="ui header">
                                <span>
                                    <i class="calendar alternate outline icon"></i> {{  $event->title }}
                                    @if ($event->public)
                                        <span class="circular ui mini blue label">Public</span>
                                    @else
                                        <span class="circular ui mini orange label">Private</span>
                                    @endif
                                </span>
                            </h5>
                        </a>
                    </div>

                    {{ $event->created_at->diffForHumans() }}
                </div>
            @empty
                <p>No events.</p>
            @endforelse
        </div>
    @endforeach
@endsection

@section('custom-scripts')
<script>
$(document).ready(function () {
    $('#emails.menu .item').tab();
});
</script>
@endsection

@section('custom-styles')
    <style>
        .event{
            margin-bottom: 1em;
        }
        .event:last-child {
            margin-bottom: 0;
        }
    </style>
@endsection