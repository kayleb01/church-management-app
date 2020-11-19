<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'user_notes';
    protected $with = ['user'];
    protected $fillable = ['note', 'user_id', 'creator'];

    public function user()
    {
        return $this->BelongsTo('App\User', 'creator');
    }
}
