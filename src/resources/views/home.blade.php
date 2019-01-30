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
                <p></p>
                <p></p>
                <p></p>
                <p></p>
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

</div>
@endsection
