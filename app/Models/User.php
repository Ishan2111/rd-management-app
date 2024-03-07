<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'acc_holder_name_1',
        'acc_holder_cif_1',
        'acc_holder_name_2',
        'acc_holder_cif_2',
        'account_number',
        'amount',
        'mobile',
        'open_date',
        'matu_date',
        'family_id',
        'payment_reciver_name',
        'payment_date',
        'payment_type',
        'address'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function setAccHolderName1Attribute($value)
    {
        $this->attributes['acc_holder_name_1'] = strtoupper($value);
    }

    public function setAccHolderName2Attribute($value)
    {
        $this->attributes['acc_holder_name_2'] = strtoupper($value);
    }
}
