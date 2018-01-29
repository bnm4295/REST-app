<?php

namespace Suuty;

use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Lexx\ChatMessenger\Traits\Messagable;


class User extends Authenticatable
{
    use Messagable;
    use Notifiable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profileimg', 'phone', 'aboutme', 'verified',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'verified',
    ];
    public function properties()
    {
        return $this->hasMany('Suuty\Property');
    }
}
