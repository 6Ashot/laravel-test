<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
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
      return $this->belongsTo('App\Employees');
  }
}
