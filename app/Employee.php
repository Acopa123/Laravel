<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
  // protected $table = 'users';
  // protected $id = "id";

  // public $timestamps = false;

  protected $fillable = [
      'nmae', 'phone', 'user', 'password',
  ];
}
