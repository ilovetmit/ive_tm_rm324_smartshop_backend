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
use App\Models\InformationManagement\BankAccount;
use App\Models\InformationManagement\Interest;
use App\Models\InformationManagement\Address;
use App\Models\InformationManagement\Device;
use App\Models\InformationManagement\Vitcoin;
use App\Models\TransactionManagement\Transaction;
use App\Models\TransactionManagement\RemittanceTransaction;
use App\Models\TransactionManagement\LockerTransaction;

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
        'id',
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
        'remember_token',
        'email_verified_at',
    ];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return ucfirst($this->first_name) . ' ' . ucfirst($this->last_name);
    }

    public function getIsAdminAttribute()
    {
        return $this->hasRole()->where('id', 1)->exists();
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
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
    public function hasBankAccount()
    {
        return $this->hasOne(BankAccount::class);
    }

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

    public function hasAddress()
    {
        return $this->hasOne(Address::class);
    }

    public function hasVitcoin()
    {
        return $this->hasOne(Vitcoin::class);
    }

    public function hasTransaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function hasRemittanceTransaction()
    {
        return $this->hasMany(RemittanceTransaction::class);
    }

    public function hasLockerTransaction()
    {
        return $this->hasMany(LockerTransaction::class);
    }
}
