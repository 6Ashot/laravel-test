<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
   protected $fillable = [
    'name',
    'email',
    'logo',
    'website'
  ];
  public $timestamps = false;
  public function employee()
  {
      return $this->belongsTo('App\Models\Employee');
  }
}
