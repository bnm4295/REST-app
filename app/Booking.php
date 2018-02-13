<?php

namespace Suuty;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
  protected $table = 'bookings';
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'id',
    'name',
    'email',
    'prop_id',
    'description',
    'openfirst',
    'opensecond',
    ];
}
