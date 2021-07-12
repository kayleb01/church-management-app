<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = "events";
    protected $fillable = [
    'title',
    'ministry',
    'user_id',
    'from',
    'to',
    'event_image',
    'event_date',
    'description',
    'attendance'
    ];

}
