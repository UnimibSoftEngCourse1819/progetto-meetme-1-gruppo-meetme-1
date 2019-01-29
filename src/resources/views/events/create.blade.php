@extends('layouts.app')

@section('content')
<div class="ui text container">
    <form method="POST" class="ui form" action="{{ route('events.store') }}">
        @csrf

        <div class="ui three top attached steps">
            <div class="active step" id="event-details-step" data-step="#step-one">
                <i class="file alternate outline icon"></i>
                <div class="content">
                    <div class="title">{{ __('Event Details') }}</div>
                    <div class="description">Insert the event data</div>
                </div>
            </div>

            <div class="disabled step" id="timeslots-steps" data-step="#step-two">
                <i class="calendar outline icon"></i>
                <div class="content">
                    <div class="title">{{ __('Time Slots')}}</div>
                    <div class="description">Propose preferred time slots</div>
                </div>
            </div>

            <div class="disabled step" id="users-step" data-step="#step-three">
                <i class="users icon"></i>
                <div class="content">
                    <div class="title">{{ __('Invite Users') }}</div>
                    <div class="description">Add people to your event</div>
                </div>
            </div>
        </div>

        <div class="ui attached segment">
            <div id="step-one">
                @include('events.steps.first')
            </div>
            <div id="step-two">
                @include('events.steps.second')
            </div>
            <div id="step-three">
                @include('events.steps.third')
            </div>
        </div>
    </form>
</div>
@endsection

@section('custom-scripts')
<script>
$(document).ready(function() {
    $('.ui.calendar').calendar();

    $('#step-two, #step-three').hide();

    $('.ui.button.next-step').on('click', function (e) {
        var $step = $('.active.step');
        console.log($step.data('step'));

        $($step.data('step')).hide();
        $step.removeClass('active');

        $step = $($(this).data('next'));
        $step.addClass('active');
        $($step.data('step')).show();
    });
});
</script>
@endsection
