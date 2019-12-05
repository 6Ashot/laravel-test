<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
   protected $fillable = [
    'firstName',
    'lastName',
    'company_id',
    'email',
    'phone'
  ];
  public $timestamps = false;
  public function company()
  {
      return $this->hasOne('App\Companies', 'id', 'company_id');
  } 
}
