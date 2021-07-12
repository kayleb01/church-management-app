<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'user_id', 'description', 'ministry'
    ];
    //  protected $with = ['people'];

    public function people()
    {
        return $this->hasMany(People::class, 'group_id');
    }

    public function leader()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
