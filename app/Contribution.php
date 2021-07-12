<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
   protected $table = "contributions";
   protected $fillable =['person_id', 'funds', 'amount', 'date', 'note', 'batch_id', 'method_id'];



   //Model relationships
   public function people()
   {
      return $this->belongsTo('App\People', 'person_id');
   }

   public function fund()
   {
      return  $this->hasMany('App\Funds', 'funds');
   }

   public function method()
   {
      return $this->hasMany('App\method');
   }
}
