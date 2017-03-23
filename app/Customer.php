<?php

namespace App;

use App\Notifications\CustomerResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone',
        'address', 'landmark', 'state', 'region', 'voucher_value',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomerResetPassword($token));
    }

    public function blogs()
    {
        return $this->hasMany('App\Blog');
    }

    // public function products()
    // {
    //     return $this->belongsToMany('App\Customer', 'transactions', 'customer_id', 'product_id');
    // }

    public function transactions()
    {
        return $this->hasMany('App\Transaction');
    }

    // public function details()
    // {
    //     return $this->hasOne('App\Detail');
    // }

}
