<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Return the owner of the email.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the associated calendar for this email.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function calendar()
    {
        return $this->hasOne(Calendar::class);
    }

    /**
     * Get the associated company
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Retrieve timeslots associated with emails
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function timeslots()
    {
        return $this->belongsToMany(TimeSlot::class);
    }
}
