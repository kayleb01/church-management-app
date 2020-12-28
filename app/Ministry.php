<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{

  protected $table = 'ministries';
  protected $fillable = ['name', 'parent', 'user_id'];
}
