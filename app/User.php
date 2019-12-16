<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email','phone_number','facebook_id','google_id','identification_type','identification_number', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'phone_number_verified_at' => 'datetime',
    ];

    public function hasVerifiedPhone()
    {
        return ! is_null($this->phone_number_verified_at);
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_number_verified_at' => $this->freshTimestamp(),
        ])->save();
    }
}
