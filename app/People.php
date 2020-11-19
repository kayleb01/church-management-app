<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    protected $table = 'peoples';
    protected $fillable = [
      'first_name',
      'last_name',
      'ministry',
      'middle_name',
      'email',
      'date_of_birth',
      'address',
      'state',
      'city',
      'zipcode',
      'gender',
      'mobile_number',
      'facebook',
      'group_id',
      'job_title',
      'employer',
      'talent',
      'school',
      'grade',
      'marital_status',
      'join_date'
    ];
}
