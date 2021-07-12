<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $fillable = ['title', 'start', 'end', 'event_id', 'ministry'];
    protected $table = "calendars";
}
