<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

    protected $table = 'peoples';
    protected $with = ['group', 'ministri'];
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

    public function getImageUrlAttribute()
    {
        return url('media/'.$this->created_at->format('Y').'/'.$this->created_at->format('m').'/' . $this->filename);
    }

    public function ministri()
    {
       return $this->belongsTo(Ministry::class, 'ministry');
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
