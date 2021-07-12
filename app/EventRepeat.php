<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventRepeat extends Model
{
    protected $table = 'event_repeat';
    protected $fillable = ['repeat', 'days', 'end_date'];
}
