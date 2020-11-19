<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People_notes extends Model
{
    protected $table = 'people_notes';
    protected $with = ['user'];
    protected $fillable = ['note', 'people_id', 'creator'];

    public function user()
    {
        return $this->BelongsTo('App\User', 'creator');
    }
}
