<?php

namespace App\Models\InformationManagement;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\UserManagement\User;

class Address extends Model
{
    use SoftDeletes;

    public $table = 'addresses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'district',
        'address1',
        'address2'
    ];

    public function hasUser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getFullAddress() //todo
    {
        return ucfirst($this->address1) . ', ' . ucfirst($this->address2) . ', ' . ucfirst(config('constant.address_district')[$this->district]);
    }

    public function getAddressLine1()
    {
        return ucfirst($this->address1);
    }

    public function getAddressLine2()
    {
        return ucfirst($this->address2);
    }

    public function getDistrict()
    {
        return ucfirst(config('constant.address_district')[$this->district]);
    }
}
