<?php

namespace App\Models\UserManagement;

use Carbon\Carbon;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

use App\Models\InformationManagement\Interest;
use App\Models\InformationManagement\Address;
use App\Models\InformationManagement\Device;
use App\Models\InformationManagement\Transaction;
use App\Models\InformationManagement\remittance_transaction;
use App\Models\InformationManagement\Vitcoins;
use App\Models\LockerManagement\locker_transaction;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, HasApiTokens;

    public $table = 'users';

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'updated_at',
        'created_at',
        'deleted_at',
        'email_verified_at',
    ];

    protected $fillable = [
        'email',
        'first_name',
        'last_name',
        'password',
        'vitcoin_address',
        'vitcoin_primary_key',
        'avatar',
        'birthday',
        'gender',
        'telephone',
        'bio',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
        'remember_token',
        'email_verified_at',
    ];

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        // return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        // $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    // relationship
    public function hasRole()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasInterest()
    {
        return $this->belongsToMany(Interest::class);
    }

    public function hasDevice()
    {
        return $this->hasMany(Device::class);
    }

    public function hasAddresse()
    {
        return $this->hasOne(Address::class);
    }

    public function hasVitcoin()
    {
        return $this->hasOne(Vitcoins::class);
    }

    public function hasTransaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function hasRemittance_transaction()
    {
        return $this->hasMany(remittance_transaction::class);
    }

    public function hasLocker_transaction()
    {
        return $this->hasMany(locker_transaction::class);
    }
}
