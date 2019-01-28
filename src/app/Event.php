<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Get all of the users emails
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function emails()
    {
        return $this->hasMany(TimeSlot::class);
    }

    /**
     * Get all the emails that can take part in this event.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function partecipants()
    {
        return $this->belongsToMany(Email::class);
    }

    /**
     * Get the user that made this event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(Email::class);
    }
}
