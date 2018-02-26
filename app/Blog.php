<?php

namespace Suuty;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

class Blog extends Model
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'id',
      'title',
      'description',
      'images',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
