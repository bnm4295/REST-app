<?php

namespace Suuty;

use Illuminate\Database\Eloquent\Model;

class SaveSearch extends Model
{
    protected $table = 'savesearch';
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'id',
    'user_id',
    'email',
    'url',
    'user_id',
  ];

}
