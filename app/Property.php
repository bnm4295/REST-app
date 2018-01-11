<?php

namespace Suuty;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;

class Property extends Model
{

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
      'id',
      'user_id',
      'title',
      'area',
      'date',
      'firstdate',
      'seconddate',
      'details',
      'price',
      'house_type',
      'street_address',
      'route',
      'city',
      'state',
      'country',
      'postal_code',
      'number_of_beds',
      'number_of_baths',
      'sold',
      'latitude',
      'longitude',
      'hideshow',
      'images',
    ];

    /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
    protected $hidden = [
    ];

    public function images() {
        return $this->hasMany('Suuty\Media');
    }
    public function offers(){
        return $this->hasMany('Suuty\Offer');
    }

}
