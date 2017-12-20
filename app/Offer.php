<?php

namespace Suuty;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
  protected $fillable = [
    'id',
    'user_id',
    'prop_id',
    'name',
    'offerprice',
    'comments',
    'status'
  ];

  public function offer()
  {
      return $this->belongsTo('Suuty\Property');
  }
}
