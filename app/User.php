<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gender', 'country', 'ministry', 'firstname', 'lastName', 'mobile_number', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 
     * This appends to the whole array of the user details
     */
    protected $with = ['ministrys'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function creator()
    {
        return $this->hasMany('App\Note', 'creator');
    }

    public function ministrys()
    {
        return $this->belongsTo('App\Ministry', 'ministry');
    }
}
