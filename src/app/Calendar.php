<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the calendar associated to this email.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function emails(){
        return $this->hasOne(Email::class);
    }
}
