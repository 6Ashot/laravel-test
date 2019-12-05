<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
      return $this->hasOne('App\Models\Company', 'id', 'company_id');
  } 
}
