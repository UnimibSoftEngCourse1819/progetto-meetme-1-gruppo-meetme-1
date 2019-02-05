<?php

namespace App;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'from', 'to'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'from' => 'datetime',
        'to' => 'datetime',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Retrieve the events associated with the current TimeSlot
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Get all the emails (users) that voted this timeslot.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function voters()
    {
        return $this->belongsToMany(Email::Class);
    }

    /**
     * Set attribute from
     *
     * @param $value
     */
    public function setFromAttribute($value)
    {
        $this->attributes['from'] = $this->parseIso8601Date($value);
    }

    /**
     * Set attribute to
     *
     * @param $value
     */
    public function setToAttribute($value)
    {
        $this->attributes['to'] = $this->parseIso8601Date($value);
    }

    /**
     * Parse String 8601
     *
     * @param $value
     * @return string
     */
    private function parseIso8601Date($value)
    {
        return Carbon::createFromFormat('Y-m-d\TH:i:s', $value)->toDateTimeString();
    }
}
