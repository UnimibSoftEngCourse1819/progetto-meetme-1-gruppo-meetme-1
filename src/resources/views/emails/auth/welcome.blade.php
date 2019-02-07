@component('mail::message')
# Introduction

Ciao {{ $user->first_name }} {{ $user->last_name }},

Grazie per aver scelto MeetMe. Hai creato con successo un nuovo account.<br>
Il tuo nome utente è: {{ $user->username }}

@component('mail::button', ['url' => ''])
Accedi subito
@endcomponent

Grazie,
Il team di {{ config('app.name') }}
@endcomponent
