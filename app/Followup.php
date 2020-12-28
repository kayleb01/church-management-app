<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    protected $table = "followups";
    protected $fillable = ['person_id', 'ministry', 'type', 'user_id', 'date', 'from', 'to', 'action_id', 'status', 'note'];
    protected $with = ['user', 'people', 'action'];

    //relationship
    public function user()
    {
        return $this->BelongsTo('App\User');
    }

    public function people()
    {
        return $this->BelongsTo('App\People', 'person_id');
    }

    public function action()
    {
        return $this->BelongsTo('App\Action');
    }
    // public function getDateAttribute($value)
    // {
    //     return Verta($value)->format('%d %B %Y');
    // }

    public function setFirstNameAttribute($value)
    {
        return ucwords($value);
    }
}
