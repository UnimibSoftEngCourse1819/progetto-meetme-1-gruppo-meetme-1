<?php

namespace App\Policies;

use App\User;
use App\Event;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the event.
     *
     * @param  \App\User  $user
     * @param  \App\Event  $event
     * @return mixed
     */
    public function view(User $user, Event $survey)
    {
        return $survey->partecipants->contains(function ($partecipant) use ($user) {
            return $partecipant->user_id === $user->id;
        });
    }

    /**
     * Determine whether the user can edit the event.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function edit(User $user, Event $event)
    {
        return $event->creator_id == $user->id;
    }
}
