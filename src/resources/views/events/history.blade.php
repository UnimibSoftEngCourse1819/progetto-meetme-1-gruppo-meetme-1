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
        <div class="ui bottom attached segment @if ($loop->index == 0) active @endif tab" data-tab="tab-{{ $loop->index }}">
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
                                @endif</h5>
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
