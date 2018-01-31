<?php

namespace Suuty;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

class Form extends Model
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'id',
      'name',
      'email',
      'description',
      'provider',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
    ];
}
