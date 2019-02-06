@extends('layouts.app')

@section('custom-styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css">
@endsection

@section('content')
<div class="ui text container">
    <form method="POST" class="ui form" action="{{ route('events.store') }}" id="event-form">
        @csrf

        <div class="ui three top attached steps">
            <div class="active step" id="event-details-step" data-step="#step-one">
                <i class="file alternate outline icon"></i>
                <div class="content">
                    <div class="title">{{ __('Event Details') }}</div>
                    <div class="description">Insert the event data</div>
                </div>
            </div>

            <div class="disabled step" id="timeslots-step" data-step="#step-two">
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

        <div class="ui attached clearing segment">
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

        @if (old('partecipants'))
            @foreach (old('partecipants') as $partecipant)
                <input type="hidden" name="partecipants[]" value="{{ $partecipant }}">
            @endforeach
        @endif
    </form>
</div>
@endsection

@section('custom-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/locale/it.js"></script>
<script>
$(document).ready(function() {
    var $form = $('#event-form');
    var $calendar = $('#calendar');
    var $partecipantList = $('#partecipant-list');
    var $partecipantEmail = $('#partecipant-email');

    $('.ui.calendar').calendar();

    $('#step-two, #step-three').hide();

    $calendar.fullCalendar({
        defaultView: 'agendaWeek',
        eventOverlap: false,
        selectOverlap: false,
        nowIndicator: true,
        businessHours: false,
        editable: true,
        @if (old('events'))
        events: [
            @foreach(old('events') as $event)
                {!! $event !!},
            @endforeach
        ],
        @endif
        header: { center: 'month,agendaWeek' },
        selectable: true,
        select: function (start, end, jsEvent, view) {
            $calendar.fullCalendar('renderEvent', {
                title: 'Proposed time',
                start: start,
                overlap: false,
                end: end
            }, true);
        },
        eventRender: function (event, element) {
            element.find('.fc-content').append('<div class="remove-event ui compact red mini icon button"><i class="icon close"></i></>');

            element.find('.remove-event').on('click', function() {
                $calendar.fullCalendar('removeEvents', event._id);
            });
        }
    });

    $('.ui.button.next-step').on('click', function () {
        var $step = $('.active.step');
        $($step.data('step')).hide();
        $step.addClass('completed');
        $step.removeClass('active');

        $step = $($(this).data('next'));
        $step.addClass('active');
        $step.removeClass('disabled');
        $($step.data('step')).show();

        $calendar.fullCalendar('render');
        $calendar.fullCalendar('rerenderEvents');
    });

    $('.ui.button.back-step').on('click', function () {
        var $step = $('.active.step');

        $($step.data('step')).hide();
        $step.addClass('disabled');
        $step.removeClass('active');

        $step = $($(this).data('next'));
        $step.addClass('active');
        $step.removeClass('completed');
        $($step.data('step')).show();

        $calendar.fullCalendar('render');
        $calendar.fullCalendar('rerenderEvents');
    });

    $('#calendar-submit').on('click', function () {
        $form.find('input[name="events[]"]').remove();

        var $events = $($calendar.fullCalendar('clientEvents'));
        $events.each(function (index, e) {
            var event = {
                title: e.title,
                start: e.start.toISOString(),
                end: e.end.toISOString()
            };

            $form.append('<input type="hidden" name="events[]" value=\'' + JSON.stringify(event) + '\'>');
        });
    });

    $('#add-partecipant').on('click', addPartecipant);
    $partecipantEmail.on('submit', addPartecipant);

    $(document).on('click', '.remove-partecipant', function () {
        var tag = $(this).data('email');

        $('input[value="' + tag + '"]').remove();
        $(this).closest('.item').remove();
    })

    function addPartecipant(event) {
        event.preventDefault();

        var email = $partecipantEmail.val();
        if (! isValidEmailAddress(email)) {
            alert('Partecipant email is not valid.');
            return;
        }

        $form.append('<input type="hidden" name="partecipants[]" value="' + email + '">');
        $partecipantEmail.val('');
        $partecipantList.append('<div class="item">' + email + '<div class="ui right floated mini red icon button remove-partecipant" data-email="' + email + '"><i class="icon close"></i></div></div>');
    }

    function isValidEmailAddress(emailAddress) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(emailAddress);
    }
});
</script>
@endsection
