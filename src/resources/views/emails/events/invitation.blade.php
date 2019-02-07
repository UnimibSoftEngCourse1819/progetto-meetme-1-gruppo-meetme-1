@component('mail::message')
# Aggiornamento: {{ $event->title }}
{{ $user->first_name }} {{ $user->last_name }} ha modificato l'evento {{ $event->title }}.

@component('mail::button', ['url' => route('surveys.show', $event->id) ])
Visualizza Aggiornamenti
@endcomponent

<br>
Il team di {{ config('app.name') }}
@endcomponent
