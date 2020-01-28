<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class LockerTransaction extends Model
{
  protected $table = 'locker_transactions';
  protected $fillable = [
    'locker_id', 'user_id', 'status'
  ];

  protected $hidden = [];

  public function locker()
  {
    return $this->hasMany(Locker::class, 'locker_id', 'locker_id');         //Many表示一對多
  }

  public function user()
  {
    return $this->hasMany(User::class, 'user_id', 'user_id');         //Many表示一對多
  }

  public function toUser()
  {
    return $this->hasMany(User::class, 'user_id', 'to_user_id');         //Many表示一對多
  }

}
