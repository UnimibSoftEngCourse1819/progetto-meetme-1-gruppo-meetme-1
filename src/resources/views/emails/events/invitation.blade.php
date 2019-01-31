@component('mail::message')
# Invito: {{ $event->title }}
{{ $user->first_name }} {{ $user->last_name }} ti invita a partecipare al sondaggio: {{ $event->title }}

@component('mail::button', ['url' => route('surveys.show', $event->id) ])
Partecipa ora
@endcomponent

<br>
Il team di {{ config('app.name') }}
@endcomponent
