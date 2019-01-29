@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Events') }}</div>

                <div class="card-body">
                    @foreach (request()->user()->emails as $email)
                        <p>Email: {{ $email->email }}</p>
                        <ul>
                            @forelse ($email->events as $event)
                                <li><a href="{{ route('events.show', ['id' => $event->id]) }}">{{ $event->title }} @if (! $event->public)(Private)@endif</a></li>
                            @empty
                                <p>No events.</p>
                            @endforelse
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
