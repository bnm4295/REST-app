<?php

namespace Suuty;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
  protected $fillable = [
    'property_id',
    'filename',
  ];

  public function propertyImages()
  {
      return $this->belongsTo('Suuty\Property');
  }
}
