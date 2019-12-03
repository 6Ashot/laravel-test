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
 
}
