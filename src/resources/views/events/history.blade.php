@extends('layouts.app')

@section('content')
<div class="ui text container">
    <div class="ui header">{{ __('My Events') }}</div>

    @foreach (request()->user()->emails as $email)
        <div class="ui segment">
            <div class="ui small header"> <i class="big envelope icon"> </i> </span> {{ $email->email }}</div>
            <ul>
                @forelse ($email->events as $event)
                    <li>
                        <div class ="ui list">
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
                        </div>
                    </li>
                @empty
                    <p>No events.</p>
                @endforelse
            </ul>
        </div>
    @endforeach
</div>
@endsection
